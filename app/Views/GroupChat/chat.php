<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<?php /** @var array $group */ ?>
<?php /** @var array $messages */ ?>
<?php /** @var array $members */ ?>

<div class="main-content" id="mainContent">
    <div class="container-fluid py-4">
        <div class="row g-4">
            <!-- MAIN CHAT -->
            <div class="col-lg-9">
                <div class="dashboard-card h-100">
                    <div class="card-body p-0">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center border-bottom p-4">
                            <div>
                                <a href="?controller=event&action=profile&id=<?= $group['Event_idEvent'] ?>" class="text-decoration-none small text-muted">
                                    <i class="bi bi-arrow-left"></i> Back to Event
                                </a>
                                <h3 class="mt-2 mb-1"><?= htmlspecialchars($group['Name']) ?></h3>
                                <p class="text-muted mb-0"><?= htmlspecialchars($group['EventTitle']) ?></p>
                            </div>

                            <div class="text-end">
                                <div class="fw-bold"><?= $group['CurrentMembers'] ?> / <?= $group['MaxMembers'] ?> Members</div>
                                <small class="text-muted"><?= htmlspecialchars($group['OwnerUsername']) ?></small>
                            </div>
                        </div>

                        <!-- Messages -->
                        <div id="messagesContainer" style="height:500px; overflow-y:auto; padding:1.5rem;">
                            <?php foreach ($messages as $message): ?>
                                <?php $isMine = $message['idUser'] == $_SESSION['user_id']; ?>

                                <div class="mb-4 d-flex <?= $isMine ? 'justify-content-end' : 'justify-content-start' ?>">
                                    <?php if (!$isMine): ?>
                                        <img
                                            src="<?= htmlspecialchars($message['PFP']) ?>"
                                            class="rounded-circle me-3 flex-shrink-0"
                                            style="width:48px; height:48px; object-fit:cover;"
                                            alt="User Avatar"
                                        >
                                    <?php endif; ?>

                                    <div style="max-width:75%;">
                                        <div class="d-flex align-items-center mb-2 <?= $isMine ? 'justify-content-end' : '' ?>">
                                            <?php if ($isMine): ?>
                                                <small class="text-muted me-2"><?= date('H:i', strtotime($message['SentAt'])) ?></small>
                                                <strong>You</strong>
                                            <?php else: ?>
                                                <strong><?= htmlspecialchars($message['Username']) ?></strong>
                                                <small class="text-muted ms-2"><?= date('H:i', strtotime($message['SentAt'])) ?></small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="<?= $isMine ? 'bg-warning text-dark ms-auto' : 'bg-light' ?>" style="border-radius:18px; padding:14px 18px; word-break:break-word; box-shadow:0 4px 10px rgba(0,0,0,.06);">
                                            <?= nl2br(htmlspecialchars($message['Content'])) ?>
                                            <?php if ($message['EditedAt']): ?>
                                                <div class="small text-muted mt-2">edited</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if ($isMine): ?>
                                        <img
                                            src="<?= htmlspecialchars($_SESSION['pfp']) ?>"
                                            class="rounded-circle ms-3 flex-shrink-0"
                                            style="width:48px; height:48px; object-fit:cover;"
                                            alt="Your Avatar"
                                        >
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Message Input -->
                        <div class="border-top p-4">
                            <form id="sendMessageForm" class="d-flex gap-3">
                                <input type="hidden" name="idGroup" value="<?= $group['idGroup'] ?>">
                                <input
                                    type="text"
                                    id="messageInput"
                                    name="content"
                                    class="form-control"
                                    placeholder="Write a message..."
                                    autocomplete="off"
                                    maxlength="1000"
                                >
                                <button class="btn btn-warning px-4" type="submit">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-3">
                <div class="dashboard-card">
                    <img
                        src="<?= htmlspecialchars($group['BannerImage']) ?>"
                        style="width:100%; height:170px; object-fit:cover;"
                        alt="Event Banner"
                    >

                    <div class="card-body">
                        <h5><?= htmlspecialchars($group['Name']) ?></h5>
                        <p class="text-muted mb-4"><?= nl2br(htmlspecialchars($group['Description'])) ?></p>

                        <div class="mb-4">
                            <div class="fw-bold mb-2">Group Owner</div>
                            <div class="d-flex align-items-center">
                                <img
                                    src="<?= htmlspecialchars($group['OwnerPFP']) ?>"
                                    class="rounded-circle me-2"
                                    style="width:42px; height:42px; object-fit:cover;"
                                    alt="Owner Avatar"
                                >
                                <?= htmlspecialchars($group['OwnerUsername']) ?>
                            </div>
                        </div>

                        <hr>

                        <div class="fw-bold mb-3">Members (<?= count($members) ?>)</div>

                        <div style="max-height:350px; overflow-y:auto;">
                            <?php foreach ($members as $member): ?>
                                <div class="d-flex align-items-center mb-3">
                                    <img
                                        src="<?= htmlspecialchars($member['PFP']) ?>"
                                        class="rounded-circle me-2"
                                        style="width:42px; height:42px; object-fit:cover;"
                                        alt="Member Avatar"
                                    >
                                    <div>
                                        <div class="fw-semibold"><?= htmlspecialchars($member['Username']) ?></div>
                                        <small class="text-muted"><?= htmlspecialchars($member['Name']) ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const messagesContainer = document.getElementById('messagesContainer');
    const form = document.getElementById('sendMessageForm');
    const input = document.getElementById('messageInput');

    let lastMessage = <?= empty($messages) ? 0 : (int)$messages[array_key_last($messages)]['idMessage'] ?>;

    // Scroll to bottom on load
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    // Send message
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (input.value.trim() === '') {
            return;
        }

        const formData = new FormData(form);

        try {
            const response = await fetch('?controller=group&action=sendMessage', {
                method: 'POST',
                body: formData
            });

            const json = await response.json();

            if (json.success) {
                input.value = '';
            }
        } catch (error) {
            console.error('Error sending message:', error);
        }
    });

    // Load new messages
    async function loadMessages() {
        try {
            const response = await fetch(
                `?controller=group&action=getMessages&idGroup=<?= $group['idGroup'] ?>&after=${lastMessage}`
            );

            const messages = await response.json();

            if (!messages.length) {
                return;
            }

            messages.forEach(message => {
                lastMessage = message.idMessage;

                const mine = message.idUser == <?= $_SESSION['user_id'] ?>;

                messagesContainer.insertAdjacentHTML('beforeend', `
                    <div class="mb-4 d-flex ${mine ? 'justify-content-end' : 'justify-content-start'}">
                        ${mine ? '' : `
                            <img
                                src="${message.PFP}"
                                class="rounded-circle me-3 flex-shrink-0"
                                style="width:48px; height:48px; object-fit:cover;"
                                alt="User Avatar"
                            >
                        `}

                        <div style="max-width:75%;">
                            <div class="d-flex align-items-center mb-2 ${mine ? 'justify-content-end' : ''}">
                                ${mine ? `
                                    <small class="text-muted me-2">${message.SentAt.substring(11,16)}</small>
                                    <strong>You</strong>
                                ` : `
                                    <strong>${message.Username}</strong>
                                    <small class="text-muted ms-2">${message.SentAt.substring(11,16)}</small>
                                `}
                            </div>

                            <div class="${mine ? 'bg-warning text-dark ms-auto' : 'bg-light'}" style="border-radius:18px; padding:14px 18px; box-shadow:0 4px 10px rgba(0,0,0,.06);">
                                ${message.Content}
                                ${message.EditedAt ? '<div class="small text-muted mt-2">edited</div>' : ''}
                            </div>
                        </div>

                        ${mine ? `
                            <img
                                src="<?= $_SESSION['pfp'] ?>"
                                class="rounded-circle ms-3 flex-shrink-0"
                                style="width:48px; height:48px; object-fit:cover;"
                                alt="Your Avatar"
                            >
                        ` : ''}
                    </div>
                `);
            });

            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        } catch (error) {
            console.error('Error loading messages:', error);
        }
    }

    // Poll for new messages every 2 seconds
    setInterval(loadMessages, 2000);
</script>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>
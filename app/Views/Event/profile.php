<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<?php /** @var array $event */ ?>
<?php /** @var array $concerts */ ?>
<?php /** @var array $groups */ ?>
<?php /** @var array|false $userOwnedGroup */ ?>

<div class="main-content" id="mainContent">
    <div class="container py-5">
        <div class="row g-4">
            <!-- LEFT COLUMN -->
            <div class="col-lg-8">
                <!-- Event Banner -->
                <div class="dashboard-card overflow-hidden mb-4">
                    <img
                        src="<?= htmlspecialchars($event['BannerImage']) ?>"
                        class="w-100"
                        style="height:260px; object-fit:cover;"
                        alt="Event Banner">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                            <div>
                                <h2 class="mb-1"><?= htmlspecialchars($event['Title']) ?></h2>
                                <p class="text-muted mb-3">
                                    <i class="bi bi-geo-alt"></i>
                                    <?= htmlspecialchars($event['CityName']) ?>
                                    • <?= htmlspecialchars($event['CountryName']) ?>
                                </p>
                            </div>

                            <?php if (!empty($event['TicketUrl'])): ?>
                                <a
                                    href="<?= htmlspecialchars($event['TicketUrl']) ?>"
                                    target="_blank"
                                    class="btn btn-warning">
                                    <i class="bi bi-ticket-perforated"></i> Tickets
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Rating -->
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <?php
                            $rating = (float)$event['AverageRating'];
                            $full = floor($rating);
                            $half = ($rating - $full) >= 0.5;

                            for ($i = 1; $i <= 5; $i++):
                            ?>
                                <?php if ($i <= $full): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php elseif ($half): ?>
                                    <i class="bi bi-star-half text-warning"></i>
                                    <?php $half = false; ?>
                                <?php else: ?>
                                    <i class="bi bi-star text-warning"></i>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <strong><?= number_format($event['AverageRating'], 1) ?></strong>
                            <span class="text-muted">(<?= $event['ReviewCount'] ?> Reviews)</span>
                        </div>

                        <!-- Stats -->
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h3 class="fw-bold mb-0"><?= $event['ConcertCount'] ?></h3>
                                <small class="text-muted">Concerts</small>
                            </div>

                            <div class="col-md-3">
                                <h3 class="fw-bold mb-0"><?= $event['ReviewCount'] ?></h3>
                                <small class="text-muted">Reviews</small>
                            </div>

                            <div class="col-md-3">
                                <h3 class="fw-bold mb-0"><?= $event['GroupCount'] ?></h3>
                                <small class="text-muted">Groups</small>
                            </div>

                            <div class="col-md-3">
                                <h3 class="fw-bold mb-0"><?= $event['Capacity'] ?></h3>
                                <small class="text-muted">Capacity</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <h4 class="mb-3">About</h4>
                        <p class="mb-0"><?= nl2br(htmlspecialchars($event['Description'])) ?></p>
                    </div>
                </div>

                <!-- Concert Schedule -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Concert Schedule</h4>
                            <span class="badge bg-dark"><?= count($concerts) ?> Concerts</span>
                        </div>

                        <?php foreach ($concerts as $concert): ?>
                            <a
                                href="?controller=concert&action=profile&id=<?= $concert['idConcert'] ?>"
                                class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center py-3 border-bottom">
                                    <img
                                        src="<?= htmlspecialchars($concert['BandProfileImage']) ?>"
                                        class="rounded-circle me-3"
                                        style="width:70px; height:70px; object-fit:cover;"
                                        alt="Band Profile">

                                    <div class="flex-grow-1">
                                        <h5 class="mb-1"><?= htmlspecialchars($concert['BandName']) ?></h5>

                                        <div class="text-muted small mb-2">
                                            <i class="bi bi-clock"></i>
                                            <?= date('H:i', strtotime($concert['StartDateTime'])) ?>
                                            - <?= date('H:i', strtotime($concert['EndDateTime'])) ?>
                                            &nbsp;&nbsp;
                                            <i class="bi bi-mic-fill"></i>
                                            <?= htmlspecialchars($concert['Stage']) ?>
                                        </div>

                                        <div>
                                            <?php
                                            $rating = (float)$concert['AverageRating'];
                                            $full = floor($rating);
                                            $half = ($rating - $full) >= 0.5;

                                            for ($i = 1; $i <= 5; $i++):
                                            ?>
                                                <?php if ($i <= $full): ?>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                <?php elseif ($half): ?>
                                                    <i class="bi bi-star-half text-warning"></i>
                                                    <?php $half = false; ?>
                                                <?php else: ?>
                                                    <i class="bi bi-star text-warning"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            <span class="ms-2 text-muted">
                                                <?= number_format($concert['AverageRating'], 1) ?>
                                                (<?= $concert['ReviewCount'] ?>)
                                            </span>
                                        </div>
                                    </div>

                                    <i class="bi bi-chevron-right fs-4 text-muted"></i>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Community Groups -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Community Groups</h4>

                            <?php if ($userOwnedGroup): ?>
                                <a
                                    href="?controller=group&action=edit&id=<?= $userOwnedGroup['idGroup'] ?>"
                                    class="btn btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Edit My Group
                                </a>
                            <?php else: ?>
                                <button
                                    class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#createGroupModal">
                                    <i class="bi bi-plus-circle"></i> Create Group
                                </button>
                            <?php endif; ?>
                        </div>

                        <?php if (empty($groups)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-chat-square-text display-3 text-muted"></i>
                                <h5 class="mt-3">No groups yet</h5>
                                <p class="text-muted">Be the first one to create a community group for this event.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($groups as $group): ?>
                                <div class="border rounded-4 p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="d-flex">
                                            <img
                                                src="<?= htmlspecialchars($group['OwnerPFP']) ?>"
                                                class="rounded-circle me-3"
                                                style="width:60px; height:60px; object-fit:cover;"
                                                alt="Owner Profile">

                                            <div>
                                                <h5 class="mb-1"><?= htmlspecialchars($group['Name']) ?></h5>

                                                <div class="small text-muted mb-2">
                                                    Created by <strong><?= htmlspecialchars($group['OwnerUsername']) ?></strong>
                                                </div>

                                                <p class="mb-0 text-muted">
                                                    <?= nl2br(htmlspecialchars($group['Description'])) ?>
                                                </p>
                                            </div>
                                        </div>

                                        <?php if ($group['User_idUser_Owner'] == $_SESSION['user_id']): ?>
                                            <span class="badge bg-warning text-dark">Your Group</span>
                                        <?php endif; ?>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <?php
                                            $percentage = ($group['CurrentMembers'] / $group['MaxMembers']) * 100;
                                            ?>

                                            <div class="progress mb-2" style="height:8px;">
                                                <div
                                                    class="progress-bar"
                                                    role="progressbar"
                                                    style="width:<?= min($percentage, 100) ?>%"></div>
                                            </div>

                                            <small
                                                class="text-muted member-count"
                                                data-group="<?= $group["idGroup"] ?>">
                                                <?= $group["CurrentMembers"] ?> / <?= $group["MaxMembers"] ?> Members
                                            </small>
                                        </div>

                                        <div>
                                            <?php if ($group['User_idUser_Owner'] == $_SESSION['user_id']): ?>
                                                <a
                                                    href="?controller=group&action=manage&id=<?= $group['idGroup'] ?>"
                                                    class="btn btn-outline-dark">
                                                    Manage
                                                </a>
                                            <?php else: ?>
                                                <?php if ($group["Joined"]): ?>

                                                    <button
                                                        class="btn btn-success group-btn"
                                                        data-group="<?= $group["idGroup"] ?>"
                                                        data-joined="1">

                                                        <i class="bi bi-check-lg"></i>

                                                        Joined

                                                    </button>

                                                <?php else: ?>
                                                    <button
                                                        class="btn btn-outline-warning group-btn"
                                                        data-group="<?= $group["idGroup"] ?>"
                                                        data-joined="0">

                                                        Join

                                                    </button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="col-lg-4">
                <div class="dashboard-card concert-sidebar" style="top:90px;">
                    <!-- Event Information -->
                    <div class="dashboard-card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4">Event Information</h4>

                            <div class="mb-3">
                                <small class="text-muted">Venue</small>
                                <div class="fw-semibold"><?= htmlspecialchars($event['VenueName']) ?></div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Address</small>
                                <div><?= htmlspecialchars($event['Address']) ?></div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Zip Code</small>
                                <div><?= htmlspecialchars($event['ZipCode']) ?></div>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Minimum Age</small>
                                <div><?= (int)$event['MinimumAge'] ?>+</div>
                            </div>

                            <div>
                                <small class="text-muted">Duration</small>
                                <div>
                                    <?= date('d M', strtotime($event['StartDateTime'])) ?>
                                    - <?= date('d M Y', strtotime($event['EndDateTime'])) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="dashboard-card mb-4">
                        <div class="card-body">
                            <h4 class="mb-3">Location</h4>

                            <iframe
                                width="100%"
                                height="260"
                                style="border:0; border-radius:18px;"
                                loading="lazy"
                                allowfullscreen
                                src="https://maps.google.com/maps?q=<?= $event['Latitude'] ?>,<?= $event['Longitude'] ?>&z=15&output=embed"></iframe>

                            <a
                                href="https://www.google.com/maps/search/?api=1&query=<?= $event['Latitude'] ?>,<?= $event['Longitude'] ?>"
                                target="_blank"
                                class="btn btn-outline-dark w-100 mt-3">
                                <i class="bi bi-geo-alt-fill"></i> Open in Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Group Modal -->
<div class="modal fade" id="createGroupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="?controller=group&action=create">
                <input type="hidden" name="idEvent" value="<?= $event['idEvent'] ?>">

                <div class="modal-header">
                    <h5>Create Group</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            maxlength="50"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea
                            name="description"
                            rows="4"
                            class="form-control"
                            maxlength="250"
                            required></textarea>
                    </div>

                    <div>
                        <label class="form-label">Maximum Members</label>
                        <input
                            type="number"
                            name="maxMembers"
                            min="2"
                            max="100"
                            value="20"
                            class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-warning">Create Group</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.group-btn').forEach(button => {
            button.addEventListener('click', async () => {
                const joined = button.dataset.joined === '1';
                const action = joined ? 'leave' : 'join';

                try {
                    const response = await fetch(
                        `?controller=group&action=${action}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `idGroup=${button.dataset.group}`
                        }
                    );

                    const data = await response.json();
                    const memberCount = document.querySelector(
                        '.member-count[data-group="' + button.dataset.group + '"]'
                    );

                    if (memberCount) {

                        const max = memberCount.textContent.match(/\/\s*(\d+)/)[1];

                        memberCount.textContent =
                            `${data.members} / ${max} Members`;

                    }

                    if (!data.success) {
                        alert('Operation failed.');
                        return;
                    }

                    if (joined) {
                        button.dataset.joined = '0';
                        button.classList.remove('btn-success');
                        button.classList.add('btn-outline-warning');
                        button.innerHTML = 'Join';
                    } else {
                        button.dataset.joined = '1';
                        button.classList.remove('btn-outline-warning');
                        button.classList.add('btn-success');
                        button.innerHTML = '<i class="bi bi-check-lg"></i> Joined';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
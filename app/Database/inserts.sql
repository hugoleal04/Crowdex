-- ==========================
-- CURRENCY
-- ==========================

INSERT INTO Currency (idCurrency, Name, ISO3, Symbol) VALUES
(1, 'Euro', 'EUR', '€'),
(2, 'Libra Esterlina', 'GBP', '£'),
(3, 'Franco Suíço', 'CHF', 'CHF'),
(4, 'Coroa Norueguesa', 'NOK', 'kr'),
(5, 'Coroa Sueca', 'SEK', 'kr'),
(6, 'Coroa Dinamarquesa', 'DKK', 'kr'),
(7, 'Złoty', 'PLN', 'zł'),
(8, 'Coroa Checa', 'CZK', 'Kč'),
(9, 'Forint', 'HUF', 'Ft'),
(10, 'Leu Romeno', 'RON', 'lei'),
(11, 'Lev Búlgaro', 'BGN', 'лв'),
(12, 'Dinar Sérvio', 'RSD', 'дин'),
(13, 'Lira Turca', 'TRY', '₺'),
(14, 'Dólar Americano', 'USD', '$'),
(15, 'Dólar Canadiano', 'CAD', 'C$'),
(16, 'Peso Mexicano', 'MXN', '$'),
(17, 'Real Brasileiro', 'BRL', 'R$'),
(18, 'Peso Argentino', 'ARS', '$'),
(19, 'Peso Chileno', 'CLP', '$'),
(20, 'Peso Colombiano', 'COP', '$'),
(21, 'Iene', 'JPY', '¥'),
(22, 'Won Sul-Coreano', 'KRW', '₩'),
(23, 'Yuan Renminbi', 'CNY', '¥'),
(24, 'Rupia Indiana', 'INR', '₹'),
(25, 'Dólar de Singapura', 'SGD', 'S$'),
(26, 'Dólar Australiano', 'AUD', 'A$'),
(27, 'Dólar Neozelandês', 'NZD', 'NZ$'),
(28, 'Dirham', 'AED', 'د.إ'),
(29, 'Riyal Saudita', 'SAR', '﷼'),
(30, 'Rand', 'ZAR', 'R'),
(31, 'Dirham Marroquino', 'MAD', 'د.م.');

-- ==========================
-- COUNTRY
-- ==========================

INSERT INTO Country (Name, ISO2, Currency_idCurrency) VALUES
('Portugal', 'PT', 1),
('Espanha', 'ES', 1),
('França', 'FR', 1),
('Alemanha', 'DE', 1),
('Itália', 'IT', 1),
('Bélgica', 'BE', 1),
('Países Baixos', 'NL', 1),
('Luxemburgo', 'LU', 1),
('Áustria', 'AT', 1),
('Irlanda', 'IE', 1),
('Finlândia', 'FI', 1),
('Grécia', 'GR', 1),
('Malta', 'MT', 1),
('Chipre', 'CY', 1),
('Eslováquia', 'SK', 1),
('Eslovénia', 'SI', 1),
('Estónia', 'EE', 1),
('Letónia', 'LV', 1),
('Lituânia', 'LT', 1),
('Croácia', 'HR', 1),
('Reino Unido', 'GB', 2),
('Suíça', 'CH', 3),
('Noruega', 'NO', 4),
('Suécia', 'SE', 5),
('Dinamarca', 'DK', 6),
('Polónia', 'PL', 7),
('Chéquia', 'CZ', 8),
('Hungria', 'HU', 9),
('Roménia', 'RO', 10),
('Bulgária', 'BG', 11),
('Sérvia', 'RS', 12),
('Turquia', 'TR', 13),
('Estados Unidos', 'US', 14),
('Canadá', 'CA', 15),
('México', 'MX', 16),
('Brasil', 'BR', 17),
('Argentina', 'AR', 18),
('Chile', 'CL', 19),
('Colômbia', 'CO', 20),
('Japão', 'JP', 21),
('Coreia do Sul', 'KR', 22),
('China', 'CN', 23),
('Índia', 'IN', 24),
('Singapura', 'SG', 25),
('Austrália', 'AU', 26),
('Nova Zelândia', 'NZ', 27),
('Emirados Árabes Unidos', 'AE', 28),
('Arábia Saudita', 'SA', 29),
('África do Sul', 'ZA', 30),
('Marrocos', 'MA', 31);

-- ==========================
-- BANDS
-- ==========================

INSERT INTO Band
(
    Name,
    Description,
    CoverImage,
    FormedYear,
    DisbandYear,
    Verified,
    Website,
    SpotifyURL,
    YoutubeURL,
    InstagramUrl,
    FacebookUrl,
    TiktokUrl,
    CreatedAt,
    UpdatedAt
)
VALUES

(
'Coldplay',
'British rock band formed in London, known for stadium anthems and melodic alternative rock.',
NULL,
1997,
NULL,
1,
'https://www.coldplay.com',
'https://open.spotify.com/artist/4gzpq5DPGxSnKTe4SA8HAU',
'https://www.youtube.com/@coldplay',
'https://www.instagram.com/coldplay',
'https://www.facebook.com/coldplay',
'https://www.tiktok.com/@coldplay',
NOW(),
NOW()
),

(
'Bring Me The Horizon',
'British rock band blending metalcore, alternative rock and electronic music.',
NULL,
2004,
NULL,
1,
'https://www.bmthofficial.com',
'https://open.spotify.com/artist/1Ffb6ejR6Fe5IamqA5oRUF',
'https://www.youtube.com/@bmthofficial',
'https://www.instagram.com/bringmethehorizon',
'https://www.facebook.com/bmthofficial',
'https://www.tiktok.com/@bmthofficial',
NOW(),
NOW()
),

(
'Sleep Token',
'Anonymous British rock band mixing progressive metal, ambient and R&B influences.',
NULL,
2016,
NULL,
1,
'https://www.sleep-token.com',
'https://open.spotify.com/artist/2n2RSaZqBuUUukhbLlpnE6',
'https://www.youtube.com/@Sleep-Token',
'https://www.instagram.com/sleep_token',
'https://www.facebook.com/sleeptoken',
'https://www.tiktok.com/@sleep_token',
NOW(),
NOW()
),

(
'Linkin Park',
'American rock band known for combining alternative rock, nu metal and electronic music.',
NULL,
1996,
NULL,
1,
'https://linkinpark.com',
'https://open.spotify.com/artist/6XyY86QOPPrYVGvF9ch6wz',
'https://www.youtube.com/@linkinpark',
'https://www.instagram.com/linkinpark',
'https://www.facebook.com/linkinpark',
'https://www.tiktok.com/@linkinpark',
NOW(),
NOW()
),

(
'Architects',
'British metalcore band recognized for technical musicianship and modern metal sound.',
NULL,
2004,
NULL,
1,
'https://architectsofficial.com',
'https://open.spotify.com/artist/3ZztVuWxHzNpl0THurTFCv',
'https://www.youtube.com/@architects',
'https://www.instagram.com/architects',
'https://www.facebook.com/architectsuk',
'https://www.tiktok.com/@architects',
NOW(),
NOW()
),

(
'Ghost',
'Swedish rock band famous for theatrical performances and occult-inspired imagery.',
NULL,
2006,
NULL,
1,
'https://ghost-official.com',
'https://open.spotify.com/artist/1Qp56T7n950O3EGMsSl81D',
'https://www.youtube.com/@thebandghost',
'https://www.instagram.com/thebandghost',
'https://www.facebook.com/thebandghost',
'https://www.tiktok.com/@thebandghost',
NOW(),
NOW()
),

(
'Imagine Dragons',
'American pop rock band from Las Vegas known for arena rock hits.',
NULL,
2008,
NULL,
1,
'https://www.imaginedragonsmusic.com',
'https://open.spotify.com/artist/53XhwfbYqKCa1cC15pYq2q',
'https://www.youtube.com/@ImagineDragons',
'https://www.instagram.com/imaginedragons',
'https://www.facebook.com/ImagineDragons',
'https://www.tiktok.com/@imaginedragons',
NOW(),
NOW()
),

(
'Metallica',
'American heavy metal band regarded as one of the most influential metal bands of all time.',
NULL,
1981,
NULL,
1,
'https://www.metallica.com',
'https://open.spotify.com/artist/2ye2Wgw4gimLv2eAKyk1NB',
'https://www.youtube.com/@metallica',
'https://www.instagram.com/metallica',
'https://www.facebook.com/Metallica',
'https://www.tiktok.com/@metallica',
NOW(),
NOW()
),

(
'Slipknot',
'American heavy metal band known for aggressive music and distinctive masks.',
NULL,
1995,
NULL,
1,
'https://slipknot1.com',
'https://open.spotify.com/artist/05fG473iIaoy82BF1aGhL8',
'https://www.youtube.com/@slipknot',
'https://www.instagram.com/slipknot',
'https://www.facebook.com/slipknot',
'https://www.tiktok.com/@slipknot',
NOW(),
NOW()
),

(
'Foo Fighters',
'American rock band founded by Dave Grohl after the dissolution of Nirvana.',
NULL,
1994,
NULL,
1,
'https://foofighters.com',
'https://open.spotify.com/artist/7jy3rLJdDQY21OgRLCZ9sD',
'https://www.youtube.com/@foofighters',
'https://www.instagram.com/foofighters',
'https://www.facebook.com/foofighters',
'https://www.tiktok.com/@foofighters',
NOW(),
NOW()
),

(
'Green Day',
'American punk rock band formed in California and pioneers of modern pop punk.',
NULL,
1987,
NULL,
1,
'https://greenday.com',
'https://open.spotify.com/artist/7oPftvlwr6VrsViSDV7fJY',
'https://www.youtube.com/@GreenDay',
'https://www.instagram.com/greenday',
'https://www.facebook.com/GreenDay',
'https://www.tiktok.com/@greenday',
NOW(),
NOW()
),

(
'Muse',
'English rock band known for progressive rock, electronic influences and spectacular live shows.',
NULL,
1994,
NULL,
1,
'https://www.muse.mu',
'https://open.spotify.com/artist/12Chz98pHFMPJEknJQMWvI',
'https://www.youtube.com/@muse',
'https://www.instagram.com/muse',
'https://www.facebook.com/muse',
'https://www.tiktok.com/@muse',
NOW(),
NOW()
),

(
'Twenty One Pilots',
'American musical duo blending alternative rock, hip hop and electronic music.',
NULL,
2009,
NULL,
1,
'https://www.twentyonepilots.com',
'https://open.spotify.com/artist/3YQKmKGau1PzlVlkL1iodx',
'https://www.youtube.com/@twentyonepilots',
'https://www.instagram.com/twentyonepilots',
'https://www.facebook.com/twentyonepilots',
'https://www.tiktok.com/@twentyonepilots',
NOW(),
NOW()
),

(
'The Killers',
'American rock band from Las Vegas famous for indie rock and alternative anthems.',
NULL,
2001,
NULL,
1,
'https://www.thekillersmusic.com',
'https://open.spotify.com/artist/0C0XlULifJtAgn6ZNCW2eu',
'https://www.youtube.com/@TheKillersMusic',
'https://www.instagram.com/thekillers',
'https://www.facebook.com/thekillers',
'https://www.tiktok.com/@thekillers',
NOW(),
NOW()
),

(
'Royal Blood',
'English rock duo known for their heavy bass-driven sound.',
NULL,
2011,
NULL,
1,
'https://www.royalbloodband.com',
'https://open.spotify.com/artist/2S3ajOf5X1E7RHPGD7YuXx',
'https://www.youtube.com/@RoyalBloodUK',
'https://www.instagram.com/royalblooduk',
'https://www.facebook.com/RoyalBloodUK',
'https://www.tiktok.com/@royalblood',
NOW(),
NOW()
),

(
'Arctic Monkeys',
'English indie rock band formed in Sheffield.',
NULL,
2002,
NULL,
1,
'https://www.arcticmonkeys.com',
'https://open.spotify.com/artist/7Ln80lUS6He07XvHI8qqHH',
'https://www.youtube.com/@ArcticMonkeys',
'https://www.instagram.com/arcticmonkeys',
'https://www.facebook.com/ArcticMonkeys',
'https://www.tiktok.com/@arcticmonkeys',
NOW(),
NOW()
),

(
'Rammstein',
'German industrial metal band famous for theatrical live shows.',
NULL,
1994,
NULL,
1,
'https://www.rammstein.de',
'https://open.spotify.com/artist/6wWVKhxIU2cEi0K81v7HvP',
'https://www.youtube.com/@RammsteinOfficial',
'https://www.instagram.com/rammsteinofficial',
'https://www.facebook.com/Rammstein',
'https://www.tiktok.com/@rammstein',
NOW(),
NOW()
),

(
'Iron Maiden',
'English heavy metal band formed in London.',
NULL,
1975,
NULL,
1,
'https://www.ironmaiden.com',
'https://open.spotify.com/artist/6mdiAmATAx73kdxrNrnlao',
'https://www.youtube.com/@ironmaiden',
'https://www.instagram.com/ironmaiden',
'https://www.facebook.com/ironmaiden',
'https://www.tiktok.com/@ironmaiden',
NOW(),
NOW()
),

(
'System Of A Down',
'Armenian-American alternative metal band.',
NULL,
1994,
NULL,
1,
'https://systemofadown.com',
'https://open.spotify.com/artist/5eAWCfyUhZtHHtBdNk56l1',
'https://www.youtube.com/@systemofadown',
'https://www.instagram.com/systemofadown',
'https://www.facebook.com/systemofadown',
'https://www.tiktok.com/@systemofadown',
NOW(),
NOW()
),

(
'Red Hot Chili Peppers',
'American funk rock band.',
NULL,
1982,
NULL,
1,
'https://redhotchilipeppers.com',
'https://open.spotify.com/artist/0L8ExT028jH3ddEcZwqJJ5',
'https://www.youtube.com/@RedHotChiliPeppers',
'https://www.instagram.com/chilipeppers',
'https://www.facebook.com/ChiliPeppers',
'https://www.tiktok.com/@redhotchilipeppers',
NOW(),
NOW()
),

(
'Billie Eilish',
'American singer-songwriter.',
NULL,
2015,
NULL,
1,
'https://billieeilish.com',
'https://open.spotify.com/artist/6qqNVTkY8uBg9cP3Jd7DAH',
'https://www.youtube.com/@BillieEilish',
'https://www.instagram.com/billieeilish',
'https://www.facebook.com/billieeilish',
'https://www.tiktok.com/@billieeilish',
NOW(),
NOW()
),

(
'Olivia Rodrigo',
'American singer-songwriter and actress.',
NULL,
2021,
NULL,
1,
'https://www.oliviarodrigo.com',
'https://open.spotify.com/artist/1McMsnEElThX1knmY4oliG',
'https://www.youtube.com/@OliviaRodrigo',
'https://www.instagram.com/oliviarodrigo',
'https://www.facebook.com/OliviaRodrigo',
'https://www.tiktok.com/@oliviarodrigo',
NOW(),
NOW()
),

(
'The Weeknd',
'Canadian singer, songwriter and producer.',
NULL,
2010,
NULL,
1,
'https://www.theweeknd.com',
'https://open.spotify.com/artist/1Xyo4u8uXC1ZmMpatF05PJ',
'https://www.youtube.com/@TheWeeknd',
'https://www.instagram.com/theweeknd',
'https://www.facebook.com/theweeknd',
'https://www.tiktok.com/@theweeknd',
NOW(),
NOW()
),

(
'Bad Omens',
'American metalcore band.',
NULL,
2015,
NULL,
1,
'https://badomensofficial.com',
'https://open.spotify.com/artist/3Ri4H12KFyu98LMjSoij5V',
'https://www.youtube.com/@BadOmensOfficial',
'https://www.instagram.com/badomensofficial',
'https://www.facebook.com/badomensofficial',
'https://www.tiktok.com/@badomensofficial',
NOW(),
NOW()
),

(
'Spiritbox',
'Canadian progressive metalcore band.',
NULL,
2017,
NULL,
1,
'https://spiritbox.com',
'https://open.spotify.com/artist/4MzJMcHQBl9SIYSjwWn8QW',
'https://www.youtube.com/@SpiritboxBand',
'https://www.instagram.com/spiritboxmusic',
'https://www.facebook.com/spiritboxmusic',
'https://www.tiktok.com/@spiritbox',
NOW(),
NOW()
),

(
'Sabaton',
'Swedish power metal band.',
NULL,
1999,
NULL,
1,
'https://www.sabaton.net',
'https://open.spotify.com/artist/3o2dn2O0FCVsWDFSh8qxgG',
'https://www.youtube.com/@sabaton',
'https://www.instagram.com/sabatonofficial',
'https://www.facebook.com/sabaton',
'https://www.tiktok.com/@sabatonofficial',
NOW(),
NOW()
);

-- ==========================
-- GENRE
-- ==========================

INSERT INTO Genre (Name) VALUES
('Alternative Rock'),
('Rock'),
('Pop'),
('Pop Rock'),
('Metal'),
('Heavy Metal'),
('Metalcore'),
('Deathcore'),
('Progressive Metal'),
('Hard Rock'),
('Nu Metal'),
('Punk Rock'),
('Pop Punk'),
('Indie Rock'),
('Electronic'),
('Synthwave'),
('EDM'),
('Hip Hop'),
('Rap'),
('R&B'),
('Jazz'),
('Blues'),
('Country'),
('Folk'),
('Classical'),
('Reggae'),
('Ska'),
('Industrial'),
('Ambient'),
('Post Rock'),
('Grunge'),
('Shoegaze'),
('Emo'),
('Symphonic Metal'),
('Black Metal'),
('Thrash Metal'),
('Doom Metal'),
('Power Metal'),
('Alternative Metal'),
('Post Hardcore'),
('Indie Pop'),
('Industrial Metal'),
('Progressive Rock');

-- ==========================
-- BAND_HAS_GENRE
-- ==========================

INSERT INTO Band_has_Genre VALUES

-- Coldplay
(1,1),
(1,2),
(1,3),

-- Bring Me The Horizon
(2,7),
(2,5),
(2,15),

-- Sleep Token
(3,9),
(3,5),
(3,15),
(3,20),

-- Linkin Park
(4,11),
(4,2),
(4,15),

-- Architects
(5,7),
(5,9),

-- Ghost
(6,10),
(6,6),
(6,34),

-- Imagine Dragons
(7,4),
(7,3),
(7,2),

-- Metallica
(8,6),
(8,36),

-- Slipknot
(9,6),
(9,11),

-- Foo Fighters
(10,2),
(10,10),

-- Green Day
(11,12),
(11,13),

-- Muse
(12,1),
(12,9),
(12,15),

-- Twenty One Pilots
(13,4),
(13,15),
(13,18),

-- The Killers
(14,14),
(14,1),

-- Royal Blood
(15,10),
(15,2),
-- Arctic Monkeys
(16,14),
(16,2),

-- Rammstein
(17,28),
(17,5),

-- Iron Maiden
(18,6),
(18,38),

-- System Of A Down
(19,11),
(19,5),
(19,2),

-- Red Hot Chili Peppers
(20,2),
(20,10),

-- Billie Eilish
(21,3),
(21,20),
(21,15),

-- Olivia Rodrigo
(22,3),
(22,4),

-- The Weeknd
(23,20),
(23,3),
(23,15),

-- Bad Omens
(24,7),
(24,5),
(24,28),

-- Spiritbox
(25,7),
(25,9),

-- Sabaton
(26,6),
(26,38);

-- ==========================
-- CITY
-- ==========================

INSERT INTO City (Timezone, Name, Country_idCountry) VALUES

-- Portugal
('Europe/Lisbon', 'Lisboa', 1),
('Europe/Lisbon', 'Porto', 1),
('Europe/Lisbon', 'Braga', 1),
('Europe/Lisbon', 'Coimbra', 1),
('Europe/Lisbon', 'Faro', 1),
('Atlantic/Azores', 'Ponta Delgada', 1),
('Atlantic/Azores', 'Angra do Heroísmo', 1),

-- Espanha
('Europe/Madrid', 'Madrid', 2),
('Europe/Madrid', 'Barcelona', 2),
('Europe/Madrid', 'Bilbao', 2),
('Europe/Madrid', 'Valencia', 2),
('Europe/Madrid', 'Sevilha', 2),

-- França
('Europe/Paris', 'Paris', 3),
('Europe/Paris', 'Lyon', 3),
('Europe/Paris', 'Marselha', 3),

-- Alemanha
('Europe/Berlin', 'Berlim', 4),
('Europe/Berlin', 'Hamburgo', 4),
('Europe/Berlin', 'Munique', 4),
('Europe/Berlin', 'Colónia', 4),

-- Itália
('Europe/Rome', 'Roma', 5),
('Europe/Rome', 'Milão', 5),
('Europe/Rome', 'Bolonha', 5),

-- Bélgica
('Europe/Brussels', 'Bruxelas', 6),
('Europe/Brussels', 'Antuérpia', 6),

-- Países Baixos
('Europe/Amsterdam', 'Amesterdão', 7),
('Europe/Amsterdam', 'Roterdão', 7),

-- Irlanda
('Europe/Dublin', 'Dublin', 10),

-- Reino Unido
('Europe/London', 'Londres', 21),
('Europe/London', 'Manchester', 21),
('Europe/London', 'Birmingham', 21),
('Europe/London', 'Glasgow', 21),

-- Suécia
('Europe/Stockholm', 'Estocolmo', 24),
('Europe/Stockholm', 'Gotemburgo', 24),

-- Dinamarca
('Europe/Copenhagen', 'Copenhaga', 25),

-- Polónia
('Europe/Warsaw', 'Varsóvia', 26),
('Europe/Warsaw', 'Cracóvia', 26),

-- Chéquia
('Europe/Prague', 'Praga', 27),

-- Hungria
('Europe/Budapest', 'Budapeste', 28),

-- Áustria
('Europe/Vienna', 'Viena', 9),

-- Suíça
('Europe/Zurich', 'Zurique', 22),

-- Noruega
('Europe/Oslo', 'Oslo', 23),

-- Finlândia
('Europe/Helsinki', 'Helsínquia', 11),

-- Estados Unidos
('America/New_York', 'New York', 33),
('America/Chicago', 'Chicago', 33),
('America/Los_Angeles', 'Los Angeles', 33),
('America/Denver', 'Denver', 33),
('America/Detroit', 'Detroit', 33),

-- Canadá
('America/Toronto', 'Toronto', 34),
('America/Vancouver', 'Vancouver', 34),

-- Japão
('Asia/Tokyo', 'Tokyo', 40),

-- Coreia do Sul
('Asia/Seoul', 'Seoul', 41),

-- Austrália
('Australia/Sydney', 'Sydney', 45),
('Australia/Melbourne', 'Melbourne', 45);


-- ==========================
-- VENUE
-- ==========================

INSERT INTO Venue
(
    City_idCity,
    Name,
    Address,
    ZipCode,
    Latitude,
    Longitude
)
VALUES

-- Portugal
(1, 'MEO Arena', 'Rossio dos Olivais, Lote 2.13.01', '1990-231', 38.7689, -9.1017),
(2, 'Super Bock Arena', 'Rua de Júlio Dinis', '4050-318', 41.1496, -8.6109),
(3, 'Altice Forum Braga', 'Praça do Município', '4700-435', 41.5502, -8.4265),
(2, 'Coliseu do Porto', 'Rua de Passos Manuel 137', '4000-385', 41.1456, -8.6126),
(1, 'Campo Pequeno', 'Praça do Campo Pequeno', '1000-082', 38.7450, -9.1366),
(1, 'Coliseu dos Recreios', 'Rua das Portas de Santo Antão 96', '1150-269', 38.7159, -9.1392),
(3, 'Multiusos de Guimarães', 'Alameda Cidade de Lisboa', '4810-445', 41.4447, -8.2919),

-- Espanha
(8, 'Movistar Arena', 'Avenida Felipe II', '28009', 40.4231, -3.6688),
(9, 'Palau Sant Jordi', 'Passeig Olímpic', '08038', 41.3660, 2.1522),
(10, 'Bilbao Arena', 'Askatasuna Hiribidea', '48003', 43.2627, -2.9350),
(8, 'Cívitas Metropolitano', 'Av. de Luis Aragonés', '28022', 40.4362, -3.5995),

-- França
(13, 'Accor Arena', '8 Boulevard de Bercy', '75012', 48.8381, 2.3788),
(13, 'Paris La Défense Arena', '99 Jardins de l''Arche', '92000', 48.8910, 2.2401),

-- Alemanha
(16, 'Uber Arena', 'Mercedes Platz 1', '10243', 52.5076, 13.4433),
(17, 'Barclays Arena', 'Sylvesterallee 10', '22525', 53.5870, 9.8983),
(18, 'Olympiahalle', 'Spiridon-Louis-Ring 21', '80809', 48.1812, 11.5545),
(19, 'Lanxess Arena', 'Willy-Brandt-Platz 3', '50679', 50.9382, 6.9822),

-- Países Baixos
(25, 'Ziggo Dome', 'De Passage 100', '1101 AX', 52.3125, 4.9442),
(25, 'Johan Cruijff Arena', 'Johan Cruijff Boulevard 1', '1101 AX', 52.3144, 4.9411),

-- Reino Unido
(29, 'Wembley Stadium', 'Wembley Park', 'HA9 0WS', 51.5560, -0.2796),
(29, 'The O2', 'Peninsula Square', 'SE10 0DX', 51.5030, 0.0032),
(30, 'AO Arena', 'Victoria Station', 'M3 1AR', 53.4880, -2.2435),
(31, 'Utilita Arena Birmingham', 'King Edwards Road', 'B1 2AA', 52.4797, -1.9162),
(32, 'OVO Hydro', 'Exhibition Way', 'G3 8YW', 55.8607, -4.2871),

-- Suécia
(33, 'Avicii Arena', 'Globentorget 2', '12177', 59.2930, 18.0839),

-- Dinamarca
(35, 'Royal Arena', 'Hannemanns Allé 18', '2300', 55.6280, 12.5807),

-- Bélgica
(23, 'Sportpaleis', 'Schijnpoortweg 119', '2170', 51.2304, 4.4416),

-- Itália
(21, 'Mediolanum Forum', 'Via Giuseppe di Vittorio 6', '20090', 45.4780, 9.1450),

-- Suíça
(39, 'Hallenstadion', 'Wallisellenstrasse 45', '8050', 47.4114, 8.5513),

-- Áustria
(38, 'Wiener Stadthalle', 'Roland-Rainer-Platz 1', '1150', 48.2027, 16.3375),

-- Estados Unidos
(43, 'Madison Square Garden', '4 Pennsylvania Plaza', '10001', 40.7505, -73.9934),
(44, 'United Center', '1901 W Madison St', '60612', 41.8807, -87.6742),
(45, 'Kia Forum', '3900 W Manchester Blvd', '90305', 33.9580, -118.3417),
(45, 'Crypto.com Arena', '1111 S Figueroa St', '90015', 34.0430, -118.2673),

-- Canadá
(48, 'Scotiabank Arena', '40 Bay St', 'M5J 2X2', 43.6435, -79.3791),
(49, 'Rogers Arena', '800 Griffiths Way', 'V6B 6G1', 49.2778, -123.1089),

-- Japão
(50, 'Tokyo Dome', '1-3-61 Koraku', '112-0004', 35.7056, 139.7514),

-- Coreia do Sul
(51, 'KSPO Dome', 'Olympic-ro 424', '05540', 37.5207, 127.1243),

-- Austrália
(52, 'Qudos Bank Arena', '19 Edwin Flack Ave', '2127', -33.8474, 151.0632),
(53, 'Rod Laver Arena', 'Batman Ave', '3004', -37.8210, 144.9787);

INSERT INTO Event
(
    Venue_idVenue,
    Title,
    Description,
    StartDateTime,
    EndDateTime,
    MinimumAge,
    Capacity,
    BannerImage,
    TicketUrl,
    Status,
    CreatedAt,
    UpdatedAt
)
VALUES

(1,'Coldplay - Music Of The Spheres Tour','European Tour',
'2026-08-21 20:30:00',
'2026-08-21 23:15:00',
6,
20000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(2,'Imagine Dragons World Tour','Live in Porto',
'2026-09-05 21:00:00',
'2026-09-05 23:30:00',
6,
12000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(3,'Architects European Tour','2026 Tour',
'2026-10-08 20:00:00',
'2026-10-08 22:45:00',
12,
12000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(5,'Royal Blood Live','Special Show',
'2026-11-12 21:00:00',
'2026-11-12 23:00:00',
12,
8500,
NULL,
NULL,
'published',
NOW(),
NOW()),

(6,'Ghost World Tour','Impera Tour',
'2026-11-25 20:30:00',
'2026-11-25 23:00:00',
12,
4000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(8,'Bring Me The Horizon','European Arena Tour',
'2026-09-04 20:30:00',
'2026-09-04 23:10:00',
14,
17000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(9,'Muse World Tour','Barcelona',
'2026-09-18 21:00:00',
'2026-09-18 23:30:00',
6,
17000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(12,'Linkin Park Reunion Tour','Paris',
'2026-10-15 20:00:00',
'2026-10-15 23:00:00',
12,
20000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(14,'Sleep Token','Even In Arcadia Tour',
'2026-09-18 20:30:00',
'2026-09-18 23:00:00',
12,
17000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(18,'Twenty One Pilots','Clancy Tour',
'2026-10-02 20:00:00',
'2026-10-02 22:45:00',
6,
17000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(20,'Metallica M72 Tour','London',
'2026-07-12 18:30:00',
'2026-07-12 23:30:00',
12,
90000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(21,'Slipknot','Here Comes The Pain',
'2026-11-07 20:30:00',
'2026-11-07 23:00:00',
16,
20000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(22,'Green Day','Saviors Tour',
'2026-08-30 20:00:00',
'2026-08-30 22:45:00',
6,
21000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(25,'Sabaton Tour','The Legendary Tour',
'2026-12-05 20:00:00',
'2026-12-05 23:00:00',
12,
16000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(31,'The Weeknd','After Hours Til Dawn',
'2026-10-20 20:30:00',
'2026-10-20 23:30:00',
12,
21000,
NULL,
NULL,
'published',
NOW(),
NOW());

INSERT INTO Event
(
    Venue_idVenue,
    Title,
    Description,
    StartDateTime,
    EndDateTime,
    MinimumAge,
    Capacity,
    BannerImage,
    TicketUrl,
    Status,
    CreatedAt,
    UpdatedAt
)
VALUES

-- FESTIVALS

(1,'Rock in Rio Lisboa 2027',
'One of Europe''s biggest music festivals.',
'2027-06-20 15:00:00',
'2027-06-21 02:00:00',
6,
80000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(1,'NOS Alive 2027',
'Three days of music at Passeio Marítimo de Algés.',
'2027-07-09 15:00:00',
'2027-07-10 03:00:00',
6,
55000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(20,'Download Festival UK',
'The biggest rock and metal festival in the UK.',
'2027-06-12 12:00:00',
'2027-06-12 23:59:00',
16,
90000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(8,'Mad Cool Festival',
'Madrid Summer Festival.',
'2027-07-15 16:00:00',
'2027-07-16 02:30:00',
12,
70000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(9,'Primavera Sound Barcelona',
'International music festival.',
'2027-06-05 15:00:00',
'2027-06-06 02:00:00',
12,
70000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(12,'Hellfest Warm Up',
'Metal celebration in Paris.',
'2027-05-22 16:00:00',
'2027-05-22 23:59:00',
16,
25000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(27,'Rock Werchter',
'Belgian rock festival.',
'2027-07-03 14:00:00',
'2027-07-04 02:00:00',
12,
88000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(37,'Summer Sonic Tokyo',
'One of Japan''s biggest festivals.',
'2027-08-14 14:00:00',
'2027-08-15 01:00:00',
12,
65000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(38,'Seoul Music Festival',
'International artists in Seoul.',
'2027-09-04 16:00:00',
'2027-09-05 00:30:00',
6,
30000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(40,'Melbourne Rock Night',
'Rock legends in Australia.',
'2027-10-08 18:30:00',
'2027-10-08 23:45:00',
12,
18000,
NULL,
NULL,
'published',
NOW(),
NOW()),

-- SINGLE SHOWS

(31,'Foo Fighters Live',
'One night only.',
'2027-03-18 20:00:00',
'2027-03-18 23:00:00',
12,
21000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(34,'Billie Eilish - Hit Me Hard And Soft Tour',
'Los Angeles.',
'2027-04-10 20:30:00',
'2027-04-10 23:00:00',
6,
20000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(33,'Olivia Rodrigo - GUTS Tour',
'Los Angeles.',
'2027-05-03 20:30:00',
'2027-05-03 23:15:00',
6,
17500,
NULL,
NULL,
'published',
NOW(),
NOW()),

(35,'Red Hot Chili Peppers',
'Toronto.',
'2027-04-24 20:00:00',
'2027-04-24 23:00:00',
12,
19000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(39,'Imagine Dragons Australia',
'Sydney.',
'2027-02-17 20:00:00',
'2027-02-17 22:45:00',
6,
21000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(30,'Rammstein Live',
'Vienna.',
'2027-08-22 20:30:00',
'2027-08-22 23:30:00',
16,
16000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(28,'Arctic Monkeys',
'Milan.',
'2027-05-18 20:30:00',
'2027-05-18 23:00:00',
6,
12500,
NULL,
NULL,
'published',
NOW(),
NOW()),

(18,'The Killers',
'Amsterdam.',
'2027-03-12 20:00:00',
'2027-03-12 22:45:00',
6,
17000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(16,'Iron Maiden',
'Munich.',
'2027-09-17 20:00:00',
'2027-09-17 23:15:00',
12,
15000,
NULL,
NULL,
'published',
NOW(),
NOW()),

(21,'System Of A Down',
'London.',
'2027-10-30 20:00:00',
'2027-10-30 23:10:00',
16,
20000,
NULL,
NULL,
'published',
NOW(),
NOW());

-- ==========================
-- CONCERT
-- ==========================

INSERT INTO Concert
(
    Band_idBand,
    Event_idEvent,
    Stage,
    StartDateTime,
    EndDateTime
)
VALUES

-- Solo concerts

(1,1,'Main Stage','2026-08-21 20:30:00','2026-08-21 23:15:00'),
(7,2,'Main Stage','2026-09-05 21:00:00','2026-09-05 23:30:00'),
(5,3,'Main Stage','2026-10-08 20:00:00','2026-10-08 22:45:00'),
(15,4,'Main Stage','2026-11-12 21:00:00','2026-11-12 23:00:00'),
(6,5,'Main Stage','2026-11-25 20:30:00','2026-11-25 23:00:00'),
(2,6,'Main Stage','2026-09-04 20:30:00','2026-09-04 23:10:00'),
(12,7,'Main Stage','2026-09-18 21:00:00','2026-09-18 23:30:00'),
(4,8,'Main Stage','2026-10-15 20:00:00','2026-10-15 23:00:00'),
(3,9,'Main Stage','2026-09-18 20:30:00','2026-09-18 23:00:00'),
(13,10,'Main Stage','2026-10-02 20:00:00','2026-10-02 22:45:00'),
(8,11,'Main Stage','2026-07-12 18:30:00','2026-07-12 23:30:00'),
(9,12,'Main Stage','2026-11-07 20:30:00','2026-11-07 23:00:00'),
(11,13,'Main Stage','2026-08-30 20:00:00','2026-08-30 22:45:00'),
(26,14,'Main Stage','2026-12-05 20:00:00','2026-12-05 23:00:00'),
(23,15,'Main Stage','2026-10-20 20:30:00','2026-10-20 23:30:00'),

-- Rock in Rio Lisboa

(1,16,'Palco Mundo','2027-06-20 22:00:00','2027-06-20 23:45:00'),
(10,16,'Palco Mundo','2027-06-20 20:00:00','2027-06-20 21:30:00'),
(7,16,'Palco Mundo','2027-06-20 18:00:00','2027-06-20 19:30:00'),
(20,16,'Galp Stage','2027-06-20 19:00:00','2027-06-20 20:15:00'),

-- NOS Alive

(14,17,'NOS Stage','2027-07-09 22:00:00','2027-07-09 23:45:00'),
(12,17,'NOS Stage','2027-07-09 20:00:00','2027-07-09 21:30:00'),
(15,17,'Heineken Stage','2027-07-09 19:00:00','2027-07-09 20:00:00'),
(13,17,'NOS Stage','2027-07-09 17:30:00','2027-07-09 18:45:00'),

-- Download Festival

(8,18,'Main Stage','2027-06-12 22:00:00','2027-06-12 23:50:00'),
(9,18,'Main Stage','2027-06-12 20:00:00','2027-06-12 21:30:00'),
(5,18,'Main Stage','2027-06-12 18:00:00','2027-06-12 19:15:00'),
(2,18,'Second Stage','2027-06-12 20:15:00','2027-06-12 21:30:00'),
(24,18,'Second Stage','2027-06-12 18:15:00','2027-06-12 19:30:00'),
(25,18,'Second Stage','2027-06-12 16:45:00','2027-06-12 17:45:00'),
(26,18,'Second Stage','2027-06-12 15:15:00','2027-06-12 16:15:00'),

-- Mad Cool

(16,19,'Main Stage','2027-07-15 22:00:00','2027-07-15 23:30:00'),
(12,19,'Main Stage','2027-07-15 20:00:00','2027-07-15 21:30:00'),
(14,19,'Main Stage','2027-07-15 18:15:00','2027-07-15 19:30:00'),

-- Primavera

(16,20,'Main Stage','2027-06-05 22:00:00','2027-06-05 23:30:00'),
(14,20,'Main Stage','2027-06-05 20:00:00','2027-06-05 21:30:00'),
(10,20,'Main Stage','2027-06-05 18:00:00','2027-06-05 19:15:00'),

-- Hellfest

(17,21,'Main Stage','2027-05-22 22:00:00','2027-05-22 23:45:00'),
(8,21,'Main Stage','2027-05-22 20:00:00','2027-05-22 21:30:00'),
(18,21,'Main Stage','2027-05-22 18:15:00','2027-05-22 19:30:00'),
(6,21,'Temple','2027-05-22 21:00:00','2027-05-22 22:00:00'),

-- Rock Werchter

(1,22,'Main Stage','2027-07-03 22:00:00','2027-07-03 23:45:00'),
(7,22,'Main Stage','2027-07-03 20:00:00','2027-07-03 21:30:00'),
(10,22,'Main Stage','2027-07-03 18:00:00','2027-07-03 19:30:00'),

-- Summer Sonic

(23,23,'Main Stage','2027-08-14 22:00:00','2027-08-14 23:30:00'),
(21,23,'Main Stage','2027-08-14 20:00:00','2027-08-14 21:15:00'),
(22,23,'Main Stage','2027-08-14 18:30:00','2027-08-14 19:30:00'),

-- Seoul Music Festival

(23,24,'Main Stage','2027-09-04 21:30:00','2027-09-04 23:00:00'),
(21,24,'Main Stage','2027-09-04 19:45:00','2027-09-04 21:00:00'),

-- Melbourne

(17,25,'Main Stage','2027-10-08 21:00:00','2027-10-08 23:30:00'),

-- Remaining solo concerts

(10,26,'Main Stage','2027-03-18 20:00:00','2027-03-18 23:00:00'),
(21,27,'Main Stage','2027-04-10 20:30:00','2027-04-10 23:00:00'),
(22,28,'Main Stage','2027-05-03 20:30:00','2027-05-03 23:15:00'),
(20,29,'Main Stage','2027-04-24 20:00:00','2027-04-24 23:00:00'),
(7,30,'Main Stage','2027-02-17 20:00:00','2027-02-17 22:45:00'),
(17,31,'Main Stage','2027-08-22 20:30:00','2027-08-22 23:30:00'),
(16,32,'Main Stage','2027-05-18 20:30:00','2027-05-18 23:00:00'),
(14,33,'Main Stage','2027-03-12 20:00:00','2027-03-12 22:45:00'),
(18,34,'Main Stage','2027-09-17 20:00:00','2027-09-17 23:15:00'),
(19,35,'Main Stage','2027-10-30 20:00:00','2027-10-30 23:10:00');

-- ==========================
-- USERS
-- ==========================

INSERT INTO User
(
Name,
Email,
Password,
Birthday,
Country_idCountry,
Verified,
Type,
Username
)
VALUES

('João Silva','joao.silva@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2001-03-14',1,1,'User','joaosilva'),

('Maria Costa','maria.costa@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1999-08-22',1,1,'User','mariacosta'),

('Pedro Fernandes','pedro.fernandes@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-01-11',1,1,'User','pedrof'),

('Ana Martins','ana.martins@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2002-05-30',1,1,'User','anamartins'),

('Lucas Pereira','lucas.pereira@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2000-11-18',1,1,'User','lucasp'),

('Tiago Rocha','tiago.rocha@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1997-07-06',1,1,'User','tiagor'),

('Sofia Almeida','sofia.almeida@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2003-02-17',1,1,'User','sofiaalmeida'),

('Miguel Sousa','miguel.sousa@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1996-09-04',1,1,'User','miguels'),

('Inês Ferreira','ines.ferreira@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2004-06-25',1,1,'User','inesf'),

('Carlos Mendes','carlos.mendes@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1995-10-10',1,1,'User','carlosm'),

('Emily Brown','emily.brown@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2000-04-20',21,1,'User','emilybrown'),

('Oliver Smith','oliver.smith@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-12-08',21,1,'User','olivers'),

('Emma Taylor','emma.taylor@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2002-03-02',21,1,'User','emmataylor'),

('James Carter','james.carter@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1997-05-16',21,1,'User','jamescarter'),

('Charlotte Hall','charlotte.hall@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1999-08-13',21,1,'User','charhall'),

('Liam Scott','liam.scott@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2001-09-29',21,1,'User','liamscott'),

('Noah Walker','noah.walker@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2003-01-09',33,1,'User','noahwalker'),

('Mia Cooper','mia.cooper@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2004-07-14',33,1,'User','miacooper'),

('Olivia Green','olivia.green@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-11-03',33,1,'User','oliviag'),

('Daniel Wilson','daniel.wilson@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1996-06-06',33,1,'User','danwilson'),

('Alex Johnson','alex.johnson@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2000-02-27',33,1,'User','alexjohnson'),

('Benjamin Lee','benjamin.lee@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1997-04-18',34,1,'User','benlee'),

('Ethan Moore','ethan.moore@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2002-09-11',34,1,'User','ethanmoore'),

('Isabella Young','isabella.young@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2003-12-20',3,1,'User','isabellay'),

('Nathan Martin','nathan.martin@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1995-08-30',3,1,'User','nathanmartin'),

('Julien Bernard','julien.bernard@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-01-22',3,1,'User','julienb'),

('Hans Müller','hans.mueller@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1996-03-18',4,1,'User','hansmueller'),

('Luca Rossi','luca.rossi@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2001-05-01',5,1,'User','lucarossi'),

('Yuki Tanaka','yuki.tanaka@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1999-10-27',40,1,'User','yukitanaka'),

('Min-Jun Kim','minjun.kim@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2002-02-12',41,1,'User','minjunkim'),
('João Costa','joao.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1999-04-18',1,1,'User','joaocosta'),

('Maria Silva','maria.silva2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2001-01-30',1,1,'User','mariasilva'),

('Pedro Costa','pedro.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-07-09',1,1,'User','pedrocosta'),

('Ana Costa','ana.costa2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2000-12-15',1,1,'User','anacosta'),

('Miguel Silva','miguel.silva2@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1997-10-02',1,1,'User','miguelsilva'),
('Coldplay Fan','coldplayfan@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2000-03-15',1,1,'User','coldplayfan'),

('Sleep Token Addict','sleeptoken@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1999-08-20',1,1,'User','sleepytoken'),

('Metallica Forever','metallica@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1998-06-11',1,1,'User','metalhead99'),

('Ghost Fan','ghostfan@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2001-11-03',1,1,'User','ghostlover'),

('BMTH Fan','bmth@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','2002-02-18',1,1,'User','bmthlover'),

('Muse Lover','muse@crowdex.test','$2y$12$ahGdSL/ghzdT5FEiuKS3xODBEGcI2ykuT.0bNhLOszWIiunkJc1oy','1997-07-01',1,1,'User','muselover');

-- ==========================
-- FOLLOW
-- ==========================
INSERT INTO Follow (idFollower, idFollowing, CreatedAt) VALUES
(42, 1, NOW()),
(42, 2, NOW()),
(42, 5, NOW()),
(42, 8, NOW()),
(42, 35, NOW()),
(42, 36, NOW()),
(42, 38, NOW()),
(42, 40, NOW()),

(1, 42, NOW()),
(2, 42, NOW()),
(7, 42, NOW()),
(12, 42, NOW()),
(18, 42, NOW()),
(35, 42, NOW()),
(39, 42, NOW());

-- ==========================
-- REVIEW
-- ==========================

INSERT INTO Review
(User_idUser, Concert_idConcert, Rating, Text, CreatedAt)
VALUES

-- João Silva
(1, 1, 5.0, 'Coldplay were absolutely phenomenal. Easily one of the best concerts I have ever attended.', NOW()),
(1, 11, 5.0, 'Metallica still dominates every stage they step on.', NOW()),

-- Maria Costa
(2, 2, 4.5, 'Imagine Dragons put on an amazing show. Great visuals and energy.', NOW()),
(2, 15, 5.0, 'The Weeknd exceeded every expectation. Incredible performance.', NOW()),

-- Lucas Pereira
(5, 6, 4.5, 'Bring Me The Horizon sounded heavier live than I expected. Amazing crowd.', NOW()),
(5, 3, 5.0, 'Architects never disappoint. Outstanding concert from start to finish.', NOW()),

-- Miguel Sousa
(8, 8, 5.0, 'Linkin Park returning to the stage was unforgettable.', NOW()),
(8, 5, 4.0, 'Ghost delivered a theatrical experience unlike any other band.', NOW()),

-- Coldplay Fan
(35, 1, 5.0, 'Chris Martin knows exactly how to connect with the audience. Perfect night.', NOW()),
(35, 16, 5.0, 'Seeing Coldplay at Rock in Rio was a dream come true.', NOW()),

-- Sleep Token Addict
(36, 9, 5.0, 'Sleep Token were hypnotic. Every song felt emotional and powerful.', NOW()),
(36, 21, 4.5, 'Hellfest was the perfect place to see them live.', NOW()),

-- Ghost Fan
(38, 5, 5.0, 'Ghost never disappoints. The stage production was incredible.', NOW()),
(38, 21, 4.5, 'Amazing atmosphere and fantastic performance from every member.', NOW()),

-- Muse Lover
(40, 7, 5.0, 'Muse were flawless. Matt Bellamy is unreal live.', NOW()),
(40, 22, 4.5, 'Fantastic performance at Rock Werchter. Incredible sound quality.', NOW());
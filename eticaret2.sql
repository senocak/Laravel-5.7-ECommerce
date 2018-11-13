-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Kas 2018, 06:58:51
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `baslik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icerik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `baslik`, `url`, `resim`, `icerik`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum1', 'lorem_ipsum_1', 'post1.jpg', '1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.\n                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.\n                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.\n                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.\n                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.', '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'Lorem Ipsum2', 'lorem_ipsum_2', 'post2.jpg', '2Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.\n                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.\n                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.\n                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.\n                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.', '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(3, 'Lorem Ipsum3', 'lorem_ipsum_3', 'post3.jpg', '3Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.\n                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.\n                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.\n                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.\n                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.', '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(4, 'Lorem Ipsum4', 'lorem_ipsum_4', 'post4.jpg', '4Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.\n                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.\n                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.\n                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.\n                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.', '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(5, 'Lorem Ipsum5', 'lorem_ipsum_5', 'post5.jpg', '5Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit velit, semper quis ullamcorper et, placerat quis quam. Aliquam condimentum lorem magna, sit amet iaculis enim porttitor ut. Vivamus commodo varius porttitor. Vivamus id fringilla metus. Donec ullamcorper facilisis justo, sed blandit magna auctor quis. Suspendisse placerat gravida vehicula. Mauris a scelerisque velit, eu commodo ex. Vestibulum urna ipsum, posuere et purus ut, luctus consectetur urna. Pellentesque risus nisl, mattis vel tincidunt sit amet, tempus sed dui. Nulla facilisi. Suspendisse potenti. Praesent nec ligula scelerisque, pretium libero at, consectetur lacus. Nunc tristique justo ac ipsum euismod, in euismod sapien hendrerit. Ut congue risus velit, quis fermentum eros pharetra a. Donec ultricies purus non turpis bibendum, a rutrum mauris mollis.\n                Fusce dapibus, nisi at faucibus fermentum, dolor tellus ultricies nulla, non tristique diam justo sit amet tellus. Donec venenatis felis non eleifend iaculis. Vestibulum volutpat sagittis nibh ut faucibus. Nullam ultrices dui eget ullamcorper tempor. Quisque vitae ultricies ex. Sed id luctus lectus. Ut quis mauris vulputate, scelerisque est id, ullamcorper erat. Maecenas sit amet efficitur sapien. Sed feugiat at erat ac congue. In in eleifend elit. Nullam molestie convallis tincidunt. Praesent bibendum urna a augue vestibulum congue. Sed vitae urna vulputate, porta nunc ut, tempor metus. Duis ullamcorper nunc mi, quis iaculis tortor elementum eget. Phasellus quis felis vestibulum, ullamcorper magna vel, mattis eros. Sed posuere sem velit.\n                Fusce laoreet pharetra felis, nec vestibulum augue ornare non. Sed cursus placerat ante et feugiat. Proin vulputate sapien id mattis sodales. Praesent id felis quis nibh maximus aliquam. Proin ut mi at magna condimentum tincidunt sagittis sit amet metus. Duis dapibus, est at vehicula feugiat, est orci malesuada leo, vitae suscipit ex diam vitae risus. Curabitur eu auctor nisi, et tincidunt arcu. Nulla commodo rutrum justo. Aenean orci nunc, dapibus egestas ligula nec, malesuada condimentum massa. Donec vel mauris finibus, feugiat ex sed, tristique elit.\n                Praesent hendrerit cursus efficitur. Pellentesque pulvinar eu nunc sit amet faucibus. Duis rutrum lacinia enim tincidunt scelerisque. Aenean tincidunt enim id hendrerit rutrum. Vivamus eu mollis mauris. Suspendisse eu eros in ligula vulputate eleifend eu ac tortor. In hac habitasse platea dictumst. Aenean hendrerit commodo lectus, scelerisque volutpat risus luctus vel.\n                Sed posuere urna risus, ac tempus arcu porttitor nec. Aenean volutpat elementum ante, quis fringilla orci pellentesque eget. Nam nisi ligula, faucibus ac placerat a, rutrum quis urna. Phasellus ex mauris, consequat vitae mi in, porta dapibus libero. Phasellus lectus erat, venenatis tincidunt fringilla eget, laoreet vel enim. Fusce nisi dui, maximus ac ultricies ac, tristique eleifend nunc. Nunc ut nunc consequat, fringilla mauris vitae, rhoncus lectus. Proin blandit feugiat lorem, ac lacinia diam. Aenean quis dolor eget neque gravida tempor. Quisque est est, viverra vitae augue quis, dignissim hendrerit ipsum. Nunc imperdiet, nisi sed lacinia ultrices, urna risus feugiat nunc, sed volutpat purus diam ac velit.', '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sira` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategoris`
--

INSERT INTO `kategoris` (`id`, `isim`, `url`, `sira`, `created_at`, `updated_at`) VALUES
(1, 'Dizüstü', 'dizustu', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'Masaüstü', 'masaustu', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(3, 'Telefon', 'telefon', 2, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(4, 'Tablet', 'tablet', 3, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(5, 'Tv', 'tv', 4, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(6, 'Kamera', 'kamera', 5, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori_urun`
--

CREATE TABLE `kategori_urun` (
  `id` int(10) UNSIGNED NOT NULL,
  `urun_id` int(10) UNSIGNED DEFAULT NULL,
  `kategori_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kategori_urun`
--

INSERT INTO `kategori_urun` (`id`, `urun_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 1, 2, NULL, NULL),
(7, 6, 2, NULL, NULL),
(8, 7, 2, NULL, NULL),
(9, 8, 2, NULL, NULL),
(10, 9, 2, NULL, NULL),
(11, 10, 2, NULL, NULL),
(12, 11, 3, NULL, NULL),
(13, 12, 3, NULL, NULL),
(14, 13, 3, NULL, NULL),
(15, 14, 3, NULL, NULL),
(16, 15, 3, NULL, NULL),
(17, 16, 4, NULL, NULL),
(18, 17, 4, NULL, NULL),
(19, 18, 4, NULL, NULL),
(20, 19, 4, NULL, NULL),
(21, 20, 4, NULL, NULL),
(22, 21, 5, NULL, NULL),
(23, 22, 5, NULL, NULL),
(24, 23, 5, NULL, NULL),
(25, 24, 5, NULL, NULL),
(26, 25, 5, NULL, NULL),
(27, 26, 6, NULL, NULL),
(28, 27, 6, NULL, NULL),
(29, 28, 6, NULL, NULL),
(30, 29, 6, NULL, NULL),
(31, 30, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kaydets`
--

CREATE TABLE `kaydets` (
  `id` int(10) UNSIGNED NOT NULL,
  `urun_id` int(10) UNSIGNED NOT NULL,
  `kullanici_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kaydets`
--

INSERT INTO `kaydets` (`id`, `urun_id`, `kullanici_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 5, 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kupons`
--

CREATE TABLE `kupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `kod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `kullanılan` int(11) NOT NULL DEFAULT '0',
  `yuzde` int(11) DEFAULT NULL,
  `son_kullanım_tarihi` date NOT NULL DEFAULT '2018-12-12',
  `aktif` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `kupons`
--

INSERT INTO `kupons` (`id`, `kod`, `tip`, `adet`, `kullanılan`, `yuzde`, `son_kullanım_tarihi`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'ABC123', 'sabit', 30, 0, NULL, '2018-12-12', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'DEF456', 'yuzde', NULL, 0, 50, '2018-12-12', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(635, '2018_11_04_134412_create_shoppingcart_table', 1),
(661, '2018_11_12_115452_create_shoppingcart_table', 2),
(723, '2014_10_12_000000_create_users_table', 3),
(724, '2014_10_12_100000_create_password_resets_table', 3),
(725, '2018_11_02_125223_create_uruns_table', 3),
(726, '2018_11_05_064420_create_kategoris_table', 3),
(727, '2018_11_05_065024_create_kategori_urun_table', 3),
(728, '2018_11_05_111611_create_kupons_table', 3),
(729, '2018_11_06_125620_create_resims_table', 3),
(730, '2018_11_06_183037_create_blogs_table', 3),
(731, '2018_11_11_174913_create_kaydets_table', 3),
(732, '2018_11_12_121637_create_sepets_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resims`
--

CREATE TABLE `resims` (
  `id` int(10) UNSIGNED NOT NULL,
  `resim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urun_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `resims`
--

INSERT INTO `resims` (`id`, `resim`, `urun_id`, `created_at`, `updated_at`) VALUES
(1, 'laptop-1.jpg', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'laptop-2.jpg', 2, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(3, 'laptop-3.jpg', 3, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(4, 'laptop-4.jpg', 4, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(5, 'laptop-5.jpg', 5, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(6, 'laptop-2.jpg', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(7, 'masaustu-1.jpg', 6, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(8, 'masaustu-2.jpg', 7, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(9, 'masaustu-3.jpg', 8, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(10, 'masaustu-4.jpg', 9, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(11, 'masaustu-5.jpg', 10, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(12, 'telefon-1.jpg', 11, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(13, 'telefon-2.jpg', 12, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(14, 'telefon-3.jpg', 13, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(15, 'telefon-4.jpg', 14, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(16, 'telefon-5.jpg', 15, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(17, 'tablet-1.jpg', 16, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(18, 'tablet-2.jpg', 17, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(19, 'tablet-3.jpg', 18, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(20, 'tablet-4.jpg', 19, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(21, 'tablet-5.jpg', 20, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(22, 'tv-1.jpg', 21, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(23, 'tv-2.jpg', 22, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(24, 'tv-3.jpg', 23, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(25, 'tv-4.jpg', 24, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(26, 'tv-5.jpg', 25, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(27, 'kamera-1.jpg', 26, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(28, 'kamera-2.jpg', 27, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(29, 'kamera-3.jpg', 28, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(30, 'kamera-4.jpg', 29, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(31, 'kamera-5.jpg', 30, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepets`
--

CREATE TABLE `sepets` (
  `id` int(10) UNSIGNED NOT NULL,
  `urun_id` int(10) UNSIGNED NOT NULL,
  `kullanici_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uruns`
--

CREATE TABLE `uruns` (
  `id` int(10) UNSIGNED NOT NULL,
  `isim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiyat` int(11) NOT NULL,
  `aciklama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onecikan` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uruns`
--

INSERT INTO `uruns` (`id`, `isim`, `url`, `detay`, `fiyat`, `aciklama`, `onecikan`, `created_at`, `updated_at`) VALUES
(1, 'Laptop 1', 'laptop-1', '13 inch, 1 TB SSD, 32GB RAM', 2723, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'Laptop 2', 'laptop-2', '14 inch, 1 TB SSD, 32GB RAM', 2779, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(3, 'Laptop 3', 'laptop-3', '15 inch, 2 TB SSD, 32GB RAM', 2304, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(4, 'Laptop 4', 'laptop-4', '13 inch, 2 TB SSD, 32GB RAM', 2041, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(5, 'Laptop 5', 'laptop-5', '14 inch, 1 TB SSD, 32GB RAM', 2338, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(6, 'Masaüstü 1', 'masaustu-1', '25 inch, 2 TB SSD, 32GB RAM', 2225, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(7, 'Masaüstü 2', 'masaustu-2', '27 inch, 1 TB SSD, 32GB RAM', 2190, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(8, 'Masaüstü 3', 'masaustu-3', '25 inch, 2 TB SSD, 32GB RAM', 2309, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(9, 'Masaüstü 4', 'masaustu-4', '25 inch, 1 TB SSD, 32GB RAM', 2476, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(10, 'Masaüstü 5', 'masaustu-5', '24 inch, 2 TB SSD, 32GB RAM', 2171, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(11, 'Telefon 1', 'telefon-1', '64GB, 5.7 inch screen, 4GHz Quad Core', 2556, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(12, 'Telefon 2', 'telefon-2', '16GB, 5.7 inch screen, 4GHz Quad Core', 2718, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(13, 'Telefon 3', 'telefon-3', '16GB, 5.7 inch screen, 4GHz Quad Core', 2768, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(14, 'Telefon 4', 'telefon-4', '32GB, 5.7 inch screen, 4GHz Quad Core', 2976, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(15, 'Telefon 5', 'telefon-5', '16GB, 5.7 inch screen, 4GHz Quad Core', 2892, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(16, 'Tablet 1', 'tablet-1', '64GB, 5.12 inch screen, 4GHz Quad Core', 2751, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(17, 'Tablet 2', 'tablet-2', '32GB, 5.10 inch screen, 4GHz Quad Core', 2939, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(18, 'Tablet 3', 'tablet-3', '32GB, 5.11 inch screen, 4GHz Quad Core', 2111, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(19, 'Tablet 4', 'tablet-4', '16GB, 5.12 inch screen, 4GHz Quad Core', 2852, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(20, 'Tablet 5', 'tablet-5', '16GB, 5.12 inch screen, 4GHz Quad Core', 2446, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(21, 'TV 1', 'tv-1', '50 inch screen, Smart TV, 4K', 2904, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(22, 'TV 2', 'tv-2', '50 inch screen, Smart TV, 4K', 2698, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(23, 'TV 3', 'tv-3', '60 inch screen, Smart TV, 4K', 2899, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(24, 'TV 4', 'tv-4', '50 inch screen, Smart TV, 4K', 2214, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(25, 'TV 5', 'tv-5', '50 inch screen, Smart TV, 4K', 2668, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(26, 'Kamera 1', 'kamera-1', 'Full Frame DSLR, with 18-55mm kit lens.', 2243, 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 1, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(27, 'Kamera 2', 'kamera-2', 'Full Frame DSLR, with 18-55mm kit lens.', 2902, 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(28, 'Kamera 3', 'kamera-3', 'Full Frame DSLR, with 18-55mm kit lens.', 2995, 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(29, 'Kamera 4', 'kamera-4', 'Full Frame DSLR, with 18-55mm kit lens.', 2107, 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(30, 'Kamera 5', 'kamera-5', 'Full Frame DSLR, with 18-55mm kit lens.', 2893, 'Lorem 5 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!', 0, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `resim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-image.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `resim`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', 'lorem@laravel.com.tr', NULL, '$2y$10$JejzXiQXwdRzN/kC2q2yOO6mYSA0ZWX2/d61Z8o///17y38eqlIPa', 1, 'lorem.jpg', NULL, '2018-11-12 10:58:52', '2018-11-12 10:58:52'),
(2, 'Lorem Ipsum2', 'lorem2@laravel.com.tr', NULL, '$2y$10$JejzXiQXwdRzN/kC2q2yOO6mYSA0ZWX2/d61Z8o///17y38eqlIPa', 0, 'no-image.png', NULL, '2018-11-12 10:58:52', '2018-11-12 10:58:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_url_unique` (`url`);

--
-- Tablo için indeksler `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_isim_unique` (`isim`),
  ADD UNIQUE KEY `kategoris_url_unique` (`url`);

--
-- Tablo için indeksler `kategori_urun`
--
ALTER TABLE `kategori_urun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_urun_urun_id_foreign` (`urun_id`),
  ADD KEY `kategori_urun_kategori_id_foreign` (`kategori_id`);

--
-- Tablo için indeksler `kaydets`
--
ALTER TABLE `kaydets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kaydets_urun_id_foreign` (`urun_id`),
  ADD KEY `kaydets_kullanici_id_foreign` (`kullanici_id`);

--
-- Tablo için indeksler `kupons`
--
ALTER TABLE `kupons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `resims`
--
ALTER TABLE `resims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resims_urun_id_foreign` (`urun_id`);

--
-- Tablo için indeksler `sepets`
--
ALTER TABLE `sepets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sepets_urun_id_foreign` (`urun_id`),
  ADD KEY `sepets_kullanici_id_foreign` (`kullanici_id`);

--
-- Tablo için indeksler `uruns`
--
ALTER TABLE `uruns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uruns_isim_unique` (`isim`),
  ADD UNIQUE KEY `uruns_url_unique` (`url`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kategori_urun`
--
ALTER TABLE `kategori_urun`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `kaydets`
--
ALTER TABLE `kaydets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kupons`
--
ALTER TABLE `kupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- Tablo için AUTO_INCREMENT değeri `resims`
--
ALTER TABLE `resims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `sepets`
--
ALTER TABLE `sepets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uruns`
--
ALTER TABLE `uruns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kategori_urun`
--
ALTER TABLE `kategori_urun`
  ADD CONSTRAINT `kategori_urun_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_urun_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `kaydets`
--
ALTER TABLE `kaydets`
  ADD CONSTRAINT `kaydets_kullanici_id_foreign` FOREIGN KEY (`kullanici_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kaydets_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`);

--
-- Tablo kısıtlamaları `resims`
--
ALTER TABLE `resims`
  ADD CONSTRAINT `resims_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`);

--
-- Tablo kısıtlamaları `sepets`
--
ALTER TABLE `sepets`
  ADD CONSTRAINT `sepets_kullanici_id_foreign` FOREIGN KEY (`kullanici_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sepets_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

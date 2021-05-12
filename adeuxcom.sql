-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Maj 2021, 15:52
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `adeuxcom`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fiche_detailees`
--

CREATE TABLE `fiche_detailees` (
  `id` int(11) NOT NULL,
  `projetencours_id` int(100) DEFAULT NULL,
  `etape1` tinyint(1) NOT NULL DEFAULT 0,
  `etape2` tinyint(1) NOT NULL DEFAULT 0,
  `etape3` tinyint(1) NOT NULL DEFAULT 0,
  `etape4` tinyint(1) NOT NULL DEFAULT 0,
  `etape5` tinyint(1) NOT NULL DEFAULT 0,
  `etape6` tinyint(1) NOT NULL DEFAULT 0,
  `etape7` tinyint(1) NOT NULL DEFAULT 0,
  `etape8` tinyint(1) NOT NULL DEFAULT 0,
  `etape9` tinyint(1) NOT NULL DEFAULT 0,
  `etape10` tinyint(1) NOT NULL DEFAULT 0,
  `etape11` tinyint(1) NOT NULL DEFAULT 0,
  `etape12` tinyint(1) NOT NULL DEFAULT 0,
  `etape13` tinyint(1) NOT NULL DEFAULT 0,
  `etape14` tinyint(1) NOT NULL DEFAULT 0,
  `etape15` tinyint(1) NOT NULL DEFAULT 0,
  `etape16` tinyint(1) NOT NULL DEFAULT 0,
  `etape17` tinyint(1) NOT NULL DEFAULT 0,
  `etape18` tinyint(1) NOT NULL DEFAULT 0,
  `etape19` tinyint(1) NOT NULL DEFAULT 0,
  `etape20` tinyint(1) NOT NULL DEFAULT 0,
  `etape21` tinyint(1) NOT NULL DEFAULT 0,
  `etape22` tinyint(1) NOT NULL DEFAULT 0,
  `etape23` tinyint(1) NOT NULL DEFAULT 0,
  `etape24` tinyint(1) NOT NULL DEFAULT 0,
  `etape25` tinyint(1) NOT NULL DEFAULT 0,
  `etape26` tinyint(1) NOT NULL DEFAULT 0,
  `etape27` tinyint(1) NOT NULL DEFAULT 0,
  `etape28` tinyint(1) NOT NULL DEFAULT 0,
  `etape29` varchar(255) NOT NULL,
  `etape30` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `fiche_detailees`
--

INSERT INTO `fiche_detailees` (`id`, `projetencours_id`, `etape1`, `etape2`, `etape3`, `etape4`, `etape5`, `etape6`, `etape7`, `etape8`, `etape9`, `etape10`, `etape11`, `etape12`, `etape13`, `etape14`, `etape15`, `etape16`, `etape17`, `etape18`, `etape19`, `etape20`, `etape21`, `etape22`, `etape23`, `etape24`, `etape25`, `etape26`, `etape27`, `etape28`, `etape29`, `etape30`) VALUES
(11, 114, 1, 0, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Bonjour', 'https://editor.datatables.net/examples/extensions/rowReorder'),
(47, 146, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Aurevoir', 'https://fr.wikihow.com/Accueil');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `page_url` text NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_url`, `page_order`) VALUES
(1, 'JSON - Dynamic Dependent Dropdown List using Jquery and Ajax', 'json-dynamic-dependent-dropdown-list-using-jquery-and-ajax', 1),
(2, 'Live Table Data Edit Delete using Tabledit Plugin in PHP', 'live-table-data-edit-delete-using-tabledit-plugin-in-php', 8),
(3, 'Create Treeview with Bootstrap Treeview Ajax JQuery in PHP\r\n', 'create-treeview-with-bootstrap-treeview-ajax-jquery-in-php', 4),
(4, 'Bootstrap Multiselect Dropdown with Checkboxes using Jquery in PHP\r\n', 'bootstrap-multiselect-dropdown-with-checkboxes-using-jquery-in-php', 7),
(5, 'Facebook Style Popup Notification using PHP Ajax Bootstrap\r\n', 'facebook-style-popup-notification-using-php-ajax-bootstrap', 6),
(6, 'Modal with Dynamic Previous & Next Data Button by Ajax PHP\r\n', 'modal-with-dynamic-previous-next-data-button-by-ajax-php', 5),
(7, 'How to Use Bootstrap Select Plugin with Ajax Jquery PHP\r\n', 'how-to-use-bootstrap-select-plugin-with-ajax-jquery-php', 9),
(8, 'How to Load CSV File data into HTML Table Using AJAX jQuery\r\n', 'how-to-load-csv-file-data-into-html-table-using-ajax-jquery', 10),
(9, 'Autocomplete Textbox using Typeahead with Ajax PHP Bootstrap\r\n', 'autocomplete-textbox-using-typeahead-with-ajax-php-bootstrap', 3),
(10, 'Export Data to Excel in Codeigniter using PHPExcel\r\n', 'export-data-to-excel-in-codeigniter-using-phpexcel', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_recover`
--

CREATE TABLE `password_recover` (
  `id` int(11) NOT NULL,
  `token_user` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projetencours`
--

CREATE TABLE `projetencours` (
  `id` int(100) NOT NULL,
  `projet` varchar(25) NOT NULL,
  `vente` date NOT NULL,
  `graphisme` varchar(20) NOT NULL,
  `facturation` varchar(10) NOT NULL,
  `nom_utilisateur` varchar(15) NOT NULL,
  `type_de_site` varchar(25) NOT NULL,
  `contenu` varchar(20) NOT NULL,
  `correction` varchar(20) NOT NULL,
  `etatprojet` varchar(20) NOT NULL DEFAULT 'En cours',
  `valide25` tinyint(1) NOT NULL DEFAULT 0,
  `facturation2` varchar(10) NOT NULL,
  `valide50` tinyint(1) NOT NULL DEFAULT 0,
  `facturation3` varchar(10) NOT NULL,
  `valide75` tinyint(1) NOT NULL DEFAULT 0,
  `facturation4` varchar(10) NOT NULL,
  `valide100` tinyint(1) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `projetencours`
--

INSERT INTO `projetencours` (`id`, `projet`, `vente`, `graphisme`, `facturation`, `nom_utilisateur`, `type_de_site`, `contenu`, `correction`, `etatprojet`, `valide25`, `facturation2`, `valide50`, `facturation3`, `valide75`, `facturation4`, `valide100`, `order_id`) VALUES
(114, 'Agreco', '2021-05-07', 'Fini', '25/01', 'Kris', 'One page ', 'En cours', '/', 'En cours', 0, '25/03', 1, '25/02', 1, '24/03', 1, 2),
(146, 'Facebook', '2021-06-19', 'En cours', '27/01', 'Magali', 'Présentation', 'En attente', '/', 'En cours', 1, '24/02', 0, '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `utilisateur`
--

CREATE TABLE `utilisateur` (
  `IdUser` int(11) NOT NULL,
  `nom_utilisateur` varchar(64) NOT NULL,
  `mot_de_passe` varchar(64) NOT NULL,
  `Admin` varchar(10) DEFAULT 'user',
  `Email` varchar(50) NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `utilisateur`
--

INSERT INTO `utilisateur` (`IdUser`, `nom_utilisateur`, `mot_de_passe`, `Admin`, `Email`, `token`) VALUES
(37, 'a', '$2y$10$L5qNK3CjYtZalGl0tzWKlehGvsbq2ChlOMY3JQ0Es7g3mkw9C0Dk6', 'admin', 'a@a', 'azdfr'),
(47, 'b', '$2y$10$IC2GaNQgZMHMenW7mZDW7eA1PKYFokHku9DpitK/8xMR.mmMzB6ge', 'user', 'b@b', 'a658b79875ec50fed8ec26b082c37ace'),
(52, 'd', '$2y$10$sVxMkM5YL0LsUlHwvQf0bOd1O3IXbdO8uO4ncqNnwM0fMwJfXX6sC', 'user', 'd@d', '2ca962e6376822e0c950c184cb86443a'),
(54, 'kris', '$2y$10$hCnXWO20oYE5JPSf1z7i6uB7FslmhAZ/YMXLFo/HwC1pBcEasZA4O', 'deleted', 'kris@kris', 'ce2398579e723aff2acc9d8c50534b53');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `fiche_detailees`
--
ALTER TABLE `fiche_detailees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projetencours_id` (`projetencours_id`);

--
-- Indeksy dla tabeli `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indeksy dla tabeli `password_recover`
--
ALTER TABLE `password_recover`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `projetencours`
--
ALTER TABLE `projetencours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeksy dla tabeli `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `fiche_detailees`
--
ALTER TABLE `fiche_detailees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT dla tabeli `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `password_recover`
--
ALTER TABLE `password_recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `projetencours`
--
ALTER TABLE `projetencours`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT dla tabeli `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `fiche_detailees`
--
ALTER TABLE `fiche_detailees`
  ADD CONSTRAINT `fiche_detailees_ibfk_1` FOREIGN KEY (`projetencours_id`) REFERENCES `projetencours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

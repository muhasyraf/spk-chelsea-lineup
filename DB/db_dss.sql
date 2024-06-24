-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2018 at 02:37 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_posisi`
--

CREATE TABLE `pm_posisi` (
  `id_posisi` varchar(6) NOT NULL,
  `namaposisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_posisi`
--

INSERT INTO `pm_posisi` (`id_posisi`, `namaposisi`) VALUES
('GK', 'Goalkeeper'),
('CB', 'Centre Back'),
('LB', 'Left Back'),
('RB', 'Right Back'),
('CMF', 'Central Midfielder'),
('AMF', 'Attacking Midfielder'),
('LMF', 'Left Midfielder'),
('RMF', 'Right Midfielder'),
('CF', 'Centre Forward');

-- --------------------------------------------------------

--
-- Table structure for table `pm_gk`
--

CREATE TABLE `pm_gk` (
  `kdnilai1` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_sm` int(3) NOT NULL,
  `target_sm` int(3) NOT NULL,
  `selisih_sm` float NOT NULL,
  `nilai_bobot_sm` float NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_lpc` int(3) NOT NULL,
  `target_lpc` int(3) NOT NULL,
  `selisih_lpc` float NOT NULL,
  `nilai_bobot_lpc` float NOT NULL,
  `nilai_cs` int(3) NOT NULL,
  `target_cs` int(3) NOT NULL,
  `selisih_cs` float NOT NULL,
  `nilai_bobot_cs` float NOT NULL,
  `nilai_cf_A1` float DEFAULT NULL,
  `nilai_sf_A1` float DEFAULT NULL,
  `nilai_tot_A1` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_gk`
--

-- INSERT INTO `pm_gk` (`kdnilai1`, `kdpemain`, `nilai_sm`, `target_sm`, `selisih_sm`, `nilai_bobot_sm`, `nilai_pc`, `target_pc`, `selisih_pc`, `nilai_bobot_pc`, `nilai_loc`, `target_loc`, `selisih_loc`, `nilai_bobot_loc`, `nilai_cs`, `target_cs`, `selisih_cs`, `nilai_bobot_cs`, `nilai_cf_A1`, `nilai_sf_A1`, `nilai_tot_A1`) VALUES
-- (4, 'P001', 3, 3, 0, 5, 3, 4, -1, 4, 3, 4, -1, 4, 2, 3, -1, 4, 4, 3, 1, 4.5, 4.33333, 4.25, 4.3),
-- (5, 'P002', 3, 3, 0, 5, 4, 4, 0, 5, 3, 4, -1, 4, 2, 3, -1, 4, 4, 3, 1, 4.5, 4.66667, 4.25, 4.5),
-- (6, 'P003', 2, 3, -1, 4, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 2, 3, -1, 4, 4.33333, 4.5, 4.4),
-- (7, 'P004', 2, 3, -1, 4, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 3, 3, 0, 5, 4.33333, 5, 4.6),
-- (8, 'P005', 1, 3, -2, 3, 1, 4, -3, 2, 1, 4, -3, 2, 1, 3, -2, 3, 1, 3, -2, 3, 2.33333, 3, 2.6),
-- (9, 'P006', 4, 3, 1, 4.5, 2, 3, -1, 4, 4, 4, 0, 5, 3, 2, 1, 4.5, 5, 4, 1, 4.5, 4.33333, 4.5, 4.4),
-- (10, 'P007', 4, 3, 1, 4.5, 3, 4, -1, 4, 4, 4, 0, 5, 3, 3, 0, 5, 3, 3, 0, 5, 4.33, 4, 4.7);

-- --------------------------------------------------------

--
-- Table structure for table `pm_kriteria`
--

CREATE TABLE `pm_kriteria` (
  `kdkriteria` varchar(4) NOT NULL,
  `id_posisi` varchar(6) DEFAULT NULL,
  `nmkriteria` varchar(30) NOT NULL,
  `jenis` set('Core','Secondary') DEFAULT NULL,
  `target` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_kriteria`
--

INSERT INTO `pm_kriteria` (`kdkriteria`, `id_posisi`, `nmkriteria`, `jenis`, `target`) VALUES
('GKSM', 'GK', 'Saves Made', 'Core', 5),
('GKPC', 'GK', 'Passes Completed', 'Secondary', 2),
('GKLPC', 'GK', 'Long Pass Accuracy', 'Secondary', 4),
('GKCS', 'GK', 'Clean Sheets', 'Core', 5),
('CBPC', 'CB', 'Passes Completed', 'Secondary', 3),
('CBTM', 'CB', 'Tackles Made', 'Core', 4),
('CBDW', 'CB', 'Duels Won', 'Core', 4),
('CBCR', 'CB', 'Clearances', 'Core', 5),
('CBCS', 'CB', 'Clean Sheets', 'Secondary', 4),
('LBPC', 'LB', 'Passes Completed', 'Secondary', 3),
('LBTM', 'LB', 'Tackles Made', 'Core', 3),
('LBDW', 'LB', 'Duels Won', 'Core', 4),
('LBCA', 'LB', 'Crosses Attempted', 'Core', 5),
('LBCR', 'LB', 'Clearances', 'Secondary', 2),
('RBPC', 'RB', 'Passes Completed', 'Secondary', 3),
('RBTM', 'RB', 'Tackles Made', 'Core', 3),
('RBDW', 'RB', 'Duels Won', 'Core', 4),
('RBCA', 'RB', 'Crosses Attempted', 'Core', 5),
('RBCR', 'RB', 'Clearances', 'Secondary', 2),
('CMCC', 'CMF', 'Chances Created', 'Secondary', 3),
('CMPC', 'CMF', 'Passes Completed', 'Core', 4),
('CMTM', 'CMF', 'Tackles Made', 'Secondary', 3),
('CMDW', 'CMF', 'Duels Won', 'Core', 4),
('CMBR', 'CMF', 'Ball Recoveries', 'Core', 5),
('LMPC', 'LMF', 'Passes Completed', 'Core', 3),
('LMAS', 'LMF', 'Assists', 'Core', 4),
('LMCC', 'LMF', 'Chances Created', 'Core', 5),
('LMDW', 'LMF', 'Duels Won', 'Secondary', 3),
('LMCA', 'LMF', 'Crosses Attempted', 'Secondary', 3),
('RMPC', 'RMF', 'Passes Completed', 'Core', 3),
('RMAS', 'RMF', 'Assists', 'Core', 4),
('RMCC', 'RMF', 'Chances Created', 'Core', 5),
('RMDW', 'RMF', 'Duels Won', 'Secondary', 3),
('RMCA', 'RMF', 'Crosses Attempted', 'Secondary', 3),
('AMPC', 'AMF', 'Passes Completed', 'Core', 4),
('AMAS', 'AMF', 'Assists', 'Core', 5),
('AMCC', 'AMF', 'Chances Created', 'Core', 5),
('AMDW', 'AMF', 'Duels Won', 'Secondary', 3),
('AMCA', 'AMF', 'Crosses Attempted', 'Secondary', 2),
('CFGO', 'CF', 'Goals', 'Core', 5),
('CFAS', 'CF', 'Assists', 'Core', 4),
('CFDW', 'CF', 'Duels won', 'Secondary', 3),
('CFTB', 'CF', 'Touches in opposition box', 'Secondary', 3),
('CFST', 'CF', 'Shots on Target', 'Core', 4);
-- --------------------------------------------------------

--
-- Table structure for table `pm_pemain`
--

CREATE TABLE `pm_pemain` (
  `kdpemain` varchar(10) NOT NULL,
  `namapemain` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_pemain`
--

INSERT INTO `pm_pemain` (`kdpemain`, `namapemain`, `posisi`) VALUES
('RS1', 'Robert Sanchez', 'GK'),
('DP28', 'Djordje Petrovic', 'GK');

-- --------------------------------------------------------

--
-- Table structure for table `pm_pengguna`
--

CREATE TABLE `pm_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_pengguna`
--

INSERT INTO `pm_pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password`) VALUES
(1, 'Admin', 'admin@sjp.com', '3af36822e70517efee60e28af87be999');

-- --------------------------------------------------------

--
-- Table structure for table `pm_cb`
--

CREATE TABLE `pm_cb` (
  `kdnilai3` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_tm` int(3) NOT NULL,
  `target_tm` int(3) NOT NULL,
  `selisih_tm` float NOT NULL,
  `nilai_bobot_tm` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_cr` int(3) NOT NULL,
  `target_cr` int(3) NOT NULL,
  `selisih_cr` float NOT NULL,
  `nilai_bobot_cr` float NOT NULL,
  `nilai_cs` int(3) NOT NULL,
  `target_cs` int(3) NOT NULL,
  `selisih_cs` float NOT NULL,
  `nilai_bobot_cs` float NOT NULL,
  `nilai_cf_A3` float NOT NULL,
  `nilai_sf_A3` float NOT NULL,
  `nilai_tot_A3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_cb`
--

-- INSERT INTO `pm_cb` (`kdnilai3`, `kdpemain`, `nilai_pc`, `target_pc`, `selisih_pc`, `nilai_bobot_pc`, `nilai_tm`, `target_tm`, `selisih_tm`, `nilai_bobot_tm`, `nilai_dw`, `target_dw`, `selisih_dw`, `nilai_bobot_dw`, `nilai_cr`, `target_cr`, `selisih_cr`, `nilai_bobot_cr`, `nilai_cf_A3`, `nilai_sf_A3`, `nilai_tot_A3`) VALUES
-- (1, 'P001', 2, 3, -1, 4, 3, 2, 1, 4.5, 3, 3, 0, 5, 3, 4, -1, 4, 4.25, 4.5, 4),
-- (2, 'P002', 2, 3, -1, 4, 3, 2, 1, 4.5, 2, 3, -1, 4, 3, 4, -1, 4, 4.25, 4, 4),
-- (3, 'P003', 3, 3, 0, 5, 2, 2, 0, 5, 3, 3, 0, 5, 4, 4, 0, 5, 5, 5, 5),
-- (4, 'P004', 3, 3, 0, 5, 3, 2, 1, 4.5, 4, 3, 1, 4.5, 4, 4, 0, 5, 4.75, 4.75, 5),
-- (5, 'P005', 1, 3, -2, 3, 1, 2, -1, 4, 1, 3, -2, 3, 1, 4, -3, 2, 3.5, 2.5, 3),
-- (6, 'P006', 4, 3, 1, 4.5, 2, 2, 0, 5, 3, 3, 0, 5, 1, 4, -3, 2, 4.75, 3.5, 4),
-- (7, 'P007', 4, 3, 1, 4.5, 2, 2, 0, 5, 3, 3, 0, 5, 1, 4, -3, 2, 4.5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pm_lb`
--

CREATE TABLE `pm_lb` (
  `kdnilai2` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_tm` int(3) NOT NULL,
  `target_tm` int(3) NOT NULL,
  `selisih_tm` float NOT NULL,
  `nilai_bobot_tm` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_ca` int(3) NOT NULL,
  `target_ca` int(3) NOT NULL,
  `selisih_ca` float NOT NULL,
  `nilai_bobot_ca` float NOT NULL,
  `nilai_cr` int(3) NOT NULL,
  `target_cr` int(3) NOT NULL,
  `selisih_cr` float NOT NULL,
  `nilai_bobot_cr` float NOT NULL,
  `nilai_cf_A2` float NOT NULL,
  `nilai_sf_A2` float NOT NULL,
  `nilai_tot_A2` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;


--
-- Dumping data for table `pm_lb`
--

-- INSERT INTO `pm_lb` (`kdnilai2`, `kdpemain`, `nilai_pc`, `target_pc`, `selisih_pc`, `nilai_bobot_pc`, `nilai_tm`, `target_tm`, `selisih_tm`, `nilai_bobot_tm`, `nilai_dw`, `target_dw`, `selisih_dw`, `nilai_bobot_dw`, `nilai_ca`, `target_ca`, `selisih_ca`, `nilai_bobot_ca`, `nilai_cf_A2`, `nilai_sf_A2`, `nilai_tot_A2`) VALUES
-- (1, 'P001', 3, 3, 0, 5, 2, 3, -1, 4, 2, 3, -1, 4, 3, 4, -1, 4, 4.5, 4, 4.3),
-- (2, 'P002', 3, 3, 0, 5, 4, 3, 1, 4.5, 2, 3, -1, 4, 4, 4, 0, 5, 4.75, 4.5, 4.65),
-- (3, 'P003', 2, 3, -1, 4, 3, 3, 0, 5, 3, 3, 0, 5, 3, 4, -1, 4, 4.5, 4.5, 4.5),
-- (4, 'P004', 2, 3, -1, 4, 3, 3, 0, 5, 4, 3, 1, 4.5, 2, 4, -2, 3, 4.5, 3.75, 4.2),
-- (5, 'P005', 1, 3, -2, 3, 1, 3, -2, 3, 1, 3, -2, 3, 1, 4, -3, 2, 3, 2.5, 2.8),
-- (6, 'P006', 4, 3, 1, 4.5, 2, 3, -1, 4, 3, 3, 0, 5, 1, 4, -3, 2, 4.25, 3.5, 3.95),
-- (7, 'P007', 5, 3, 2, 3.5, 3, 3, 0, 5, 2, 3, -1, 4, 4, 4, 0, 5, 4.25, 4.5, 4.35);

CREATE TABLE `pm_rb` (
  `kdnilai4` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_tm` int(3) NOT NULL,
  `target_tm` int(3) NOT NULL,
  `selisih_tm` float NOT NULL,
  `nilai_bobot_tm` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_ca` int(3) NOT NULL,
  `target_ca` int(3) NOT NULL,
  `selisih_ca` float NOT NULL,
  `nilai_bobot_ca` float NOT NULL,
  `nilai_cr` int(3) NOT NULL,
  `target_cr` int(3) NOT NULL,
  `selisih_cr` float NOT NULL,
  `nilai_bobot_cr` float NOT NULL,
  `nilai_cf_A4` float NOT NULL,
  `nilai_sf_A4` float NOT NULL,
  `nilai_tot_A4` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

CREATE TABLE `pm_cmf` (
  `kdnilai5` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_cc` int(3) NOT NULL,
  `target_cc` int(3) NOT NULL,
  `selisih_cc` float NOT NULL,
  `nilai_bobot_cc` float NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_tm` int(3) NOT NULL,
  `target_tm` int(3) NOT NULL,
  `selisih_tm` float NOT NULL,
  `nilai_bobot_tm` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_br` int(3) NOT NULL,
  `target_br` int(3) NOT NULL,
  `selisih_br` float NOT NULL,
  `nilai_bobot_br` float NOT NULL,
  `nilai_cf_A5` float NOT NULL,
  `nilai_sf_A5` float NOT NULL,
  `nilai_tot_A5` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

CREATE TABLE `pm_lmf` (
  `kdnilai6` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_as` int(3) NOT NULL,
  `target_as` int(3) NOT NULL,
  `selisih_as` float NOT NULL,
  `nilai_bobot_as` float NOT NULL,
  `nilai_cc` int(3) NOT NULL,
  `target_cc` int(3) NOT NULL,
  `selisih_cc` float NOT NULL,
  `nilai_bobot_cc` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_ca` int(3) NOT NULL,
  `target_ca` int(3) NOT NULL,
  `selisih_ca` float NOT NULL,
  `nilai_bobot_ca` float NOT NULL,
  `nilai_cf_A6` float NOT NULL,
  `nilai_sf_A6` float NOT NULL,
  `nilai_tot_A6` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

CREATE TABLE `pm_rmf` (
  `kdnilai7` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_as` int(3) NOT NULL,
  `target_as` int(3) NOT NULL,
  `selisih_as` float NOT NULL,
  `nilai_bobot_as` float NOT NULL,
  `nilai_cc` int(3) NOT NULL,
  `target_cc` int(3) NOT NULL,
  `selisih_cc` float NOT NULL,
  `nilai_bobot_cc` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_ca` int(3) NOT NULL,
  `target_ca` int(3) NOT NULL,
  `selisih_ca` float NOT NULL,
  `nilai_bobot_ca` float NOT NULL,
  `nilai_cf_A7` float NOT NULL,
  `nilai_sf_A7` float NOT NULL,
  `nilai_tot_A7` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

CREATE TABLE `pm_amf` (
  `kdnilai8` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_pc` int(3) NOT NULL,
  `target_pc` int(3) NOT NULL,
  `selisih_pc` float NOT NULL,
  `nilai_bobot_pc` float NOT NULL,
  `nilai_as` int(3) NOT NULL,
  `target_as` int(3) NOT NULL,
  `selisih_as` float NOT NULL,
  `nilai_bobot_as` float NOT NULL,
  `nilai_cc` int(3) NOT NULL,
  `target_cc` int(3) NOT NULL,
  `selisih_cc` float NOT NULL,
  `nilai_bobot_cc` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_ca` int(3) NOT NULL,
  `target_ca` int(3) NOT NULL,
  `selisih_ca` float NOT NULL,
  `nilai_bobot_ca` float NOT NULL,
  `nilai_cf_A8` float NOT NULL,
  `nilai_sf_A8` float NOT NULL,
  `nilai_tot_A8` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

CREATE TABLE `pm_cf` (
  `kdnilai9` int(2) NOT NULL,
  `kdpemain` varchar(10) NOT NULL,
  `nilai_go` int(3) NOT NULL,
  `target_go` int(3) NOT NULL,
  `selisih_go` float NOT NULL,
  `nilai_bobot_go` float NOT NULL,
  `nilai_as` int(3) NOT NULL,
  `target_as` int(3) NOT NULL,
  `selisih_as` float NOT NULL,
  `nilai_bobot_as` float NOT NULL,
  `nilai_dw` int(3) NOT NULL,
  `target_dw` int(3) NOT NULL,
  `selisih_dw` float NOT NULL,
  `nilai_bobot_dw` float NOT NULL,
  `nilai_tb` int(3) NOT NULL,
  `target_tb` int(3) NOT NULL,
  `selisih_tb` float NOT NULL,
  `nilai_bobot_tb` float NOT NULL,
  `nilai_st` int(3) NOT NULL,
  `target_st` int(3) NOT NULL,
  `selisih_st` float NOT NULL,
  `nilai_bobot_st` float NOT NULL,
  `nilai_cf_A9` float NOT NULL,
  `nilai_sf_A9` float NOT NULL,
  `nilai_tot_A9` float NOT NULL
) ENGINE=Innoca DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_posisi`
--
ALTER TABLE `pm_posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `pm_gk`
--
ALTER TABLE `pm_gk`
  ADD PRIMARY KEY (`kdnilai1`);

--
-- Indexes for table `pm_kriteria`
--
ALTER TABLE `pm_kriteria`
  ADD PRIMARY KEY (`kdkriteria`);

--
-- Indexes for table `pm_pemain`
--
ALTER TABLE `pm_pemain`
  ADD PRIMARY KEY (`kdpemain`);

--
-- Indexes for table `pm_pengguna`
--
ALTER TABLE `pm_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pm_cb`
--
ALTER TABLE `pm_cb`
  ADD PRIMARY KEY (`kdnilai3`);

--
-- Indexes for table `pm_lb`
--
ALTER TABLE `pm_lb`
  ADD PRIMARY KEY (`kdnilai2`);

ALTER TABLE `pm_rb`
  ADD PRIMARY KEY (`kdnilai4`);

ALTER TABLE `pm_cmf`
  ADD PRIMARY KEY (`kdnilai5`);

ALTER TABLE `pm_lmf`
  ADD PRIMARY KEY (`kdnilai6`);

ALTER TABLE `pm_rmf`
  ADD PRIMARY KEY (`kdnilai7`);

ALTER TABLE `pm_amf`
  ADD PRIMARY KEY (`kdnilai8`);

ALTER TABLE `pm_cf`
  ADD PRIMARY KEY (`kdnilai9`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm_gk`
--
ALTER TABLE `pm_gk`
  MODIFY `kdnilai1` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pm_pengguna`
--
ALTER TABLE `pm_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pm_cb`
--
ALTER TABLE `pm_cb`
  MODIFY `kdnilai3` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pm_lb`
--
ALTER TABLE `pm_lb`
  MODIFY `kdnilai2` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `pm_rb`
  MODIFY `kdnilai4` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `pm_cmf`
  MODIFY `kdnilai5` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `pm_lmf`
  MODIFY `kdnilai6` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `pm_rmf`
  MODIFY `kdnilai7` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `pm_amf`
  MODIFY `kdnilai8` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `pm_cf`
  MODIFY `kdnilai9` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


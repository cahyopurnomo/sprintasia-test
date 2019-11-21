/*
 Navicat Premium Data Transfer

 Source Server         : localhost-docker
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : 127.0.0.1:3306
 Source Schema         : testing

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 21/11/2019 12:08:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tblKendaraan
-- ----------------------------
DROP TABLE IF EXISTS `tblKendaraan`;
CREATE TABLE `tblKendaraan`  (
  `IDX` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NO_RANGKA` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NO_POLISI` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `MEREK` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TIPE` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TAHUN` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`IDX`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblKendaraan
-- ----------------------------
INSERT INTO `tblKendaraan` VALUES (1, '12345778555', 'B 1234 SHX', 'TOYOTA2', 'AVANZA2', '2011');
INSERT INTO `tblKendaraan` VALUES (2, '867855986896', 'B 3452 WGH', 'MERCY', 'S300', '2033');
INSERT INTO `tblKendaraan` VALUES (3, '88898986756578578', 'BM 8888 TRS', 'BMW', 'S505', '2012');
INSERT INTO `tblKendaraan` VALUES (5, '23823823627637', 'K 9896 DWF', 'DAIHATSU', 'XENIA', '2019');
INSERT INTO `tblKendaraan` VALUES (6, '7678373636337377', 'S 9896 DWG', 'DAIHATSU', 'TERIOS', '2019');
INSERT INTO `tblKendaraan` VALUES (11, '55555555555555555555', 'F 5555 GGG', 'Roll Royce', 'Velfire', '2007');

SET FOREIGN_KEY_CHECKS = 1;

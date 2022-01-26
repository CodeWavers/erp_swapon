#
# TABLE STRUCTURE FOR: acc_coa
#

DROP TABLE IF EXISTS `acc_coa`;

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL,
  PRIMARY KEY (`HeadName`),
  KEY `HeadCode` (`HeadCode`),
  KEY `customer_id` (`customer_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '0-ArmanUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 11:07:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '0-IrfanUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 09:53:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '0-Md Arman Ullah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 11:16:13', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000002', '0-Rifat', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 0, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 02:43:01', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010212', '011111111111', 'Cash At Bkash', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 17:15:51', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010211', '0124567355', 'Cash At Bkash', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-05 19:44:01', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010210', '01836714343', 'Cash At Bkash', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-01 07:27:22', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010301', '01913613207', 'Cash At Bkash', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 17:21:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000001', '1-Walking Customer', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 1, NULL, '0.00', '1', '2019-11-16 08:44:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040009', '10-Engineering Khan', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:48:50', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020003', '10-Shenzhen Mindray Bio-Medical Electronics Co., Ltd', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 10, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '11-MainulUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:52:27', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000003', '11-Rifat', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 11, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 02:54:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020004', '11-TEKNOVA Medical Systems Limited', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 11, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000004', '12-Customer Hasan', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 12, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-01 09:43:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '12-Engineering ihy', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:55:12', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020005', '12-Shenzhen Comen Medical Instruments Co., Ltd.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 12, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020006', '13-Boditech Med Inc.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 13, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '13-DSUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 07:27:26', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000005', '13-Helen', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 13, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-08 06:57:01', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020007', '14-BMC Medical Co., Ltd.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 14, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '14-RIfat Khan', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 07:38:02', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000006', '14-Rishi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 14, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-08 07:27:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '15-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 07:46:41', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000007', '15-GMEBD', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 15, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-01 08:46:15', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020008', '15-Hunan VentMed Medical Technology Co., Ltd.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 15, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '16-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 07:47:33', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000008', '16-Mizbah', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 16, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-31 07:43:49', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020009', '16-SHENZHEN EAST MEDICAL TECHNOLOGY  CO., LTD ', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 16, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '17-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 09:41:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030000009', '17-Leo Messi', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 17, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-01 10:04:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020010', '17-SHENZHEN EMPEROR ELECTRONIC TECHNOLOGY CO., LTD', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 17, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '18-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 09:41:25', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102030100001', '18-Helen', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, 18, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 18:42:33', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020011', '18-WUHAN ZONCARE BIO-M EDICAL ELECTRONICS CO.,LTD', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 18, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '19-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 09:41:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020012', '19-XIAN HAIYE MEDICAL EQUIPMENT., LTD', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 19, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040001', '2-Md. IsahaqHossain', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-28 07:32:03', 'OpSoxJvBbbS8Rws', '2021-03-09 09:48:22');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '20-Engineering Solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 09:41:58', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020013', '20-Garnier Diagnostic GMbH', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 20, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020014', '21-CARETIUM MEDICAL INSTRUMENTS CO., LIMITED', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 21, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '21-MdUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 10:00:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '22-MdUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 10:03:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020015', '22-Shenzhen Prokan Electronics Inc.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 22, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020016', '23-GENORAY CO., LTD.', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 23, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '23-Md Arman Ullah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 10:12:17', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '24-Engineering Ullah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 10:45:01', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020017', '24-Philosys Co. Ltd', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 24, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040010', '25-ArmanUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 11:20:46', 'OpSoxJvBbbS8Rws', '2021-03-15 08:12:45');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020018', '25-BIOTEC UK LTD', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 25, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020019', '26-Greiner Diagnostic GmbH', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 26, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020020', '27-Shijiazhuang Hipro Biotechnology Co. Ltd', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 27, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020021', '28-Local Purchase', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 28, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020022', '29-3s', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 29, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-25 12:27:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040002', '3-Md ArmanUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-08 08:06:52', 'OpSoxJvBbbS8Rws', '2021-03-09 10:22:27');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50205000002', '30-Devenport', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 30, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 17:52:55', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502020001', '31-Max', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 31, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 18:01:27', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040003', '4-Rifat Khan', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-09 08:16:45', 'OpSoxJvBbbS8Rws', '2021-03-09 10:21:58');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040004', '5-JohnHarrison', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-13 07:15:23', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040005', '6-ArmanUllah', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-13 07:22:54', 'OpSoxJvBbbS8Rws', '2021-03-13 10:00:49');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50205000001', '7-Local Supplier', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 7, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-24 06:47:00', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040006', '7-MainulSolution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:29:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040007', '8-ArmanSolution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:36:17', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020001', '8-VINNO Technology (Suzhou) Co., Ltd', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 8, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5020002', '9-GE-Biomedical', 'Account Payable', 3, 1, 1, 0, 'L', 0, 0, NULL, 9, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:27:48', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502040008', '9-Md Arman solution', 'Employee Ledger', 3, 1, 1, 0, 'L', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-14 06:41:24', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10106', 'ABC', 'XYZ', 2, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-23 10:27:19', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50202', 'Account Payable', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, NULL, NULL, '0.00', 'admin', '2015-10-15 19:50:43', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10203', 'Account Receivable', 'Current Asset', 2, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', 'admin', '2013-09-18 15:29:35');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10104', 'Airconditioner', 'XYZ', 2, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:36:34', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1', 'Assets', 'COA', 0, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010208', 'Brac Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:33:42', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10201', 'Cash & Cash Equivalent', 'Current Asset', 2, 1, 0, 1, 'A', 0, 0, NULL, NULL, '0.00', '1', '2019-06-25 13:47:29', 'admin', '2015-10-15 15:57:55');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', 3, 1, 0, 1, 'A', 0, 0, NULL, NULL, '0.00', '1', '2019-03-18 06:08:18', 'admin', '2015-10-15 15:32:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020103', 'Cash At Bkash', 'Cash & Cash Equivalent', 3, 1, 0, 1, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-01 07:23:09', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', 3, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', '1', '2019-01-26 07:38:48', 'admin', '2016-05-23 12:05:43');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10103', 'Computer & Accessories', 'XYZ', 2, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:37:25', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10105', 'Computers', 'XYZ', 2, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-23 10:27:01', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102', 'Current Asset', 'Assets', 1, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', 'admin', '2018-07-07 11:23:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('502', 'Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, NULL, NULL, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020301', 'Customer Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, NULL, NULL, '0.00', '1', '2019-01-24 12:10:05', 'admin', '2018-07-07 12:31:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010206', 'Eastern Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:29:36', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('50204', 'Employee Ledger', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, NULL, NULL, '0.00', '1', '2019-04-08 10:36:32', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('403', 'Employee Salary', 'Expence', 1, 1, 1, 0, 'E', 0, 1, NULL, NULL, '1.00', '1', '2019-06-17 11:44:52', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('2', 'Equity', 'COA', 0, 1, 0, 0, 'L', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('4', 'Expence', 'COA', 0, 1, 0, 0, 'E', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010202', 'First Security Islami Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:21:13', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('101', 'Fixed Assets', 'Assets', 1, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-03-01 06:10:31', 'admin', '2015-10-15 15:29:11');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('3', 'Income', 'COA', 0, 1, 0, 0, 'I', 0, 0, NULL, NULL, '0.00', '', '2019-09-05 00:00:00', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40101', 'Internet Bill', 'Operating Expenses', 2, 1, 1, 0, 'E', 0, 0, NULL, NULL, '0.00', '2', '2020-09-05 08:01:07', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010207', 'Islami Bank Bangladesh Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:31:10', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010204', 'Janata Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:27:45', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('5', 'Liabilities', 'COA', 0, 1, 0, 0, 'L', 0, 0, NULL, NULL, '0.00', 'admin', '2013-07-04 12:32:07', 'admin', '2015-10-15 19:46:54');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('1020302', 'Loan Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, NULL, NULL, '0.00', '1', '2019-01-26 07:37:20', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010203', 'Mercantile Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:25:06', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('501', 'Non Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, NULL, NULL, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10102', 'Office Furniture & Fittings', 'XYZ', 2, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-01-28 01:38:16', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('40102', 'Office Rent', 'Operating Expenses', 2, 1, 1, 0, 'E', 0, 0, NULL, NULL, '0.00', '2', '2020-09-05 08:01:32', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('401', 'Operating Expenses', 'Expence', 1, 1, 1, 0, 'E', 0, 1, NULL, NULL, '1.00', '2', '2020-09-05 08:00:43', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('402', 'Product Purchase', 'Expence', 1, 1, 0, 0, 'E', 0, 0, NULL, NULL, '0.00', '2', '2018-07-07 14:00:16', 'admin', '2015-10-15 18:37:42');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('303', 'Product Sale', 'Income', 1, 1, 1, 0, 'I', 0, 0, NULL, NULL, '0.00', '1', '2019-06-17 08:22:42', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('304', 'Service Income', 'Income', 1, 1, 1, 0, 'I', 0, 0, NULL, NULL, '0.00', '1', '2019-06-17 11:31:11', '', '2019-09-05 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('30401', 'Service Revenue', 'Service Income', 2, 1, 1, 0, 'I', 0, 0, NULL, NULL, '0.00', '2', '2020-10-26 16:03:41', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010201', 'Standard Chartered Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:19:40', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010209', 'The City Bank Ltd.', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:36:40', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('102010205', 'United Commercial Bank Ltd (UCBL)', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'tF2YChLBH86gHfG', '2021-01-25 10:28:47', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10203020001', 'VJF5GQ3T8C-Mainul', 'Loan Receivable', 4, 1, 1, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-05-06 19:08:03', '', '0000-00-00 00:00:00');
INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `customer_id`, `supplier_id`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES ('10107', 'XYZ', 'XYZ', 2, 1, 0, 0, 'A', 0, 0, NULL, NULL, '0.00', 'OpSoxJvBbbS8Rws', '2021-02-23 10:27:34', '', '2019-09-05 00:00:00');


#
# TABLE STRUCTURE FOR: acc_transaction
#

DROP TABLE IF EXISTS `acc_transaction`;

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`),
  KEY `COAID` (`COAID`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (7, '6236676735', NULL, 'INV', '2021-05-04', '10107', 'Inventory credit For Invoice No1001', '0.00', '116000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-04 12:29:12', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (8, '6236676735', NULL, 'INV', '2021-05-04', '102030000001', 'Customer debit For Invoice No -  1001 Customer Walking Customer', '120000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-04 12:29:12', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (9, '6236676735', NULL, 'INVOICE', '2021-05-04', '303', 'Sale Income For Invoice NO - 1001 Customer Walking Customer', '0.00', '120000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-04 12:29:12', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (10, '6236676735', NULL, 'INV', '2021-05-04', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1001 Customer- Walking Customer', '0.00', '120000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-04 12:29:12', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (11, 'CHV-1', NULL, 'AD', '2021-05-04', '1020101', '', '0.00', '5000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-04 17:30:12', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (12, 'DV-1', NULL, 'DV', '2021-05-04', '502040010', '', '6000.00', '0.00', '1', NULL, '2021-05-04 17:36:08', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (13, 'DV-1', NULL, 'DV', '2021-05-04', '1020101', 'Debit voucher from Cash In Hand', '0.00', '6000.00', '1', NULL, '2021-05-04 17:36:08', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (28, '5537139972', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1003', '0.00', '19428.57', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:07:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (29, '5537139972', NULL, 'INV', '2021-05-05', '1020301', 'Customer debit For Invoice No -  1003 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:07:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (30, '5537139972', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1003 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:07:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (31, '5537139972', NULL, 'INV', '2021-05-05', '1020301', 'Customer credit for Paid Amount For Customer Invoice NO- 1003 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:07:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (32, '5537139972', NULL, 'INV', '2021-05-05', '1020101', 'Cash in Hand in Sale for Invoice No - 1003 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:07:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (33, '20210505172049', NULL, 'Purchase', '2021-05-05', '10107', 'Inventory Debit For Supplier 3s', '1800000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:20:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (34, '20210505172049', NULL, 'Purchase', '2021-05-05', '5020022', 'Supplier .3s', '0.00', '1800000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (35, '20210505172049', NULL, 'Purchase', '2021-05-05', '402', 'Company Credit For  3s', '1800000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:20:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (36, '20210505172049', NULL, 'Purchase', '2021-05-05', '102010201', 'Paid amount for Supplier  3s', '0.00', '1800000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:20:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (37, '20210505172049', NULL, 'Purchase', '2021-05-05', '5020022', 'Supplier .3s', '1800000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (38, '20210505175757', NULL, 'Purchase', '2021-05-05', '10107', 'Inventory Debit For Supplier 3s', '900000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:57:57', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (39, '20210505175757', NULL, 'Purchase', '2021-05-05', '5020022', 'Supplier .3s', '0.00', '900000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (40, '20210505175757', NULL, 'Purchase', '2021-05-05', '402', 'Company Credit For  3s', '900000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:57:57', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (41, '20210505175757', NULL, 'Purchase', '2021-05-05', '1020101', 'Cash in Hand For Supplier 3s', '0.00', '900000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 17:57:57', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (42, '20210505175757', NULL, 'Purchase', '2021-05-05', '5020022', 'Supplier .3s', '900000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (43, '4881722577', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1004', '0.00', '192941.18', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:28:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (44, '4881722577', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1004 Customer Walking Customer', '200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:28:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (45, '4881722577', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1004 Customer Walking Customer', '0.00', '200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:28:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (46, '4881722577', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1004 Customer- Walking Customer', '0.00', '200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:28:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (47, '6295714652', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1005', '0.00', '96666.67', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:32:37', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (48, '6295714652', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1005 Customer Walking Customer', '100000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:32:37', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (49, '6295714652', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1005 Customer Walking Customer', '0.00', '100000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:32:37', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (50, '6295714652', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1005 Customer- Walking Customer', '0.00', '100000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:32:37', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (51, '9794571786', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1007', '0.00', '19368.42', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:35:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (52, '9794571786', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1007 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:35:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (53, '9794571786', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1007 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:35:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (54, '9794571786', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1007 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:35:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (55, '5935467793', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1008', '0.00', '19400.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:36:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (56, '5935467793', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1008 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:36:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (57, '5935467793', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1008 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:36:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (58, '5935467793', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1008 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:36:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (59, '4664169247', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1009', '0.00', '19428.57', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:39:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (60, '4664169247', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1009 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:39:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (61, '4664169247', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1009 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:39:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (62, '4664169247', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1009 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:39:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (63, '2738126449', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1010', '0.00', '19454.55', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:41:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (64, '2738126449', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1010 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:41:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (65, '2738126449', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1010 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:41:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (66, '2738126449', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1010 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:41:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (67, '6165572246', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1011', '0.00', '19478.26', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:42:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (68, '6165572246', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1011 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:42:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (69, '6165572246', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1011 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:42:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (70, '6165572246', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1011 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:42:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (71, '2685339961', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1012', '0.00', '19500.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:45:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (72, '2685339961', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1012 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:45:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (73, '2685339961', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1012 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:45:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (74, '2685339961', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1012 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:45:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (75, '8694694793', NULL, 'INV', '2021-05-05', '10107', 'Inventory credit For Invoice No1013', '0.00', '19520.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:46:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (76, '8694694793', NULL, 'INV', '2021-05-05', '102030000001', 'Customer debit For Invoice No -  1013 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:46:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (77, '8694694793', NULL, 'INVOICE', '2021-05-05', '303', 'Sale Income For Invoice NO - 1013 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:46:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (78, '8694694793', NULL, 'INV', '2021-05-05', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1013 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:46:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (79, '8694694793', NULL, 'INVOICE', '2021-05-05', '102010211', 'Cash in Bkash paid amount for customer  Invoice No - 1013 customer -Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-05 19:46:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (80, '8342962114', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1014', '0.00', '97692.31', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:21', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (81, '8342962114', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1014 Customer Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:21', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (82, '8342962114', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1014 Customer Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:21', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (83, '8342962114', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1014 Customer- Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:21', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (84, '8342962114', NULL, 'INVOICE', '2021-05-06', '102010211', 'Cash in Bkash paid amount for customer  Invoice No - 1014 customer -Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:21', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (85, '1945198425', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1015', '0.00', '103333.33', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:44', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (86, '1945198425', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1015 Customer Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:44', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (87, '1945198425', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1015 Customer Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:44', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (88, '1945198425', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1015 Customer- Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:44', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (89, '1945198425', NULL, 'INVOICE', '2021-05-06', '102010211', 'Cash in Bkash paid amount for customer  Invoice No - 1015 customer -Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:33:44', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (90, '4654184897', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1016', '0.00', '108571.43', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:34:54', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (91, '4654184897', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1016 Customer Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:34:54', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (92, '4654184897', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1016 Customer Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:34:54', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (93, '4654184897', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1016 Customer- Walking Customer', '0.00', '250000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:34:54', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (94, '4654184897', NULL, 'INVOICE', '2021-05-06', '102010211', 'Cash in Bkash paid amount for customer  Invoice No - 1016 customer -Walking Customer', '250000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 10:34:54', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (95, '8613692778', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1017', '0.00', '22689.66', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:52:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (96, '8613692778', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1017 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:52:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (97, '8613692778', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1017 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:52:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (98, '5624342686', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1018', '0.00', '22600.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:54:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (99, '5624342686', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1018 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:54:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (100, '5624342686', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1018 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:54:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (101, '2821288466', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1019', '0.00', '22516.13', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:58:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (102, '2821288466', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1019 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:58:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (103, '2821288466', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1019 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:58:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (104, '2821288466', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1019 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:58:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (105, '2821288466', NULL, 'INVOICE', '2021-05-06', '102010211', 'Cash in Bkash paid amount for customer  Invoice No - 1019 customer -Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 16:58:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (106, '4824233858', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1020', '0.00', '22437.50', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:00:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (107, '4824233858', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1020 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:00:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (108, '4824233858', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1020 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:00:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (109, '4824233858', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1020 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:00:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (110, '4824233858', NULL, 'INV', '2021-05-06', '1020101', 'Cash in Hand in Sale for Invoice No - 1020 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:00:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (111, '6143567251', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1021', '0.00', '22363.64', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:01:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (112, '6143567251', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1021 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:01:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (113, '6143567251', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1021 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:01:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (114, '6143567251', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1021 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:01:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (115, '6143567251', NULL, 'INV', '2021-05-06', '1020101', 'Cash in Hand in Sale for Invoice No - 1021 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:01:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (116, '1896883372', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1022', '0.00', '22294.12', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:17:22', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (117, '1896883372', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1022 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:17:22', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (118, '1896883372', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1022 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:17:22', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (119, '1896883372', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1022 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:17:22', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (120, '1896883372', NULL, 'INVOICE', '2021-05-06', '102010212', 'Cash in Bkash paid amount for customer  Invoice No - 1022 customer -Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:17:22', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (121, '7462669828', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1023', '0.00', '22228.57', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:22:06', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (122, '7462669828', NULL, 'INV', '2021-05-06', '102030000001', 'Customer debit For Invoice No -  1023 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:22:06', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (123, '7462669828', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1023 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:22:06', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (124, '7462669828', NULL, 'INV', '2021-05-06', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1023 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:22:06', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (125, '7462669828', NULL, 'INVOICE', '2021-05-06', '102010301', 'Cash in Bkash paid amount for customer  Invoice No - 1023 customer -Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:22:06', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (126, '20210506175510', NULL, 'Purchase', '2021-05-06', '10107', 'Inventory Debit For Supplier Devenport', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:55:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (127, '20210506175510', NULL, 'Purchase', '2021-05-06', '50205000002', 'Supplier .Devenport', '0.00', '1200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (128, '20210506175510', NULL, 'Purchase', '2021-05-06', '402', 'Company Credit For  Devenport', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:55:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (129, '20210506175510', NULL, 'Purchase', '2021-05-06', '1020101', 'Cash in Hand For Supplier Devenport', '0.00', '1200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 17:55:10', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (130, '20210506175510', NULL, 'Purchase', '2021-05-06', '50202000002', 'Supplier .Devenport', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (131, '20210506180302', NULL, 'Purchase', '2021-05-06', '10107', 'Inventory Debit For Supplier Max', '2400000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:03:02', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (132, '20210506180302', NULL, 'Purchase', '2021-05-06', '502020001', 'Supplier .Max', '0.00', '2400000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (133, '20210506180302', NULL, 'Purchase', '2021-05-06', '402', 'Company Credit For  Max', '2400000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:03:02', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (134, '20210506180302', NULL, 'Purchase', '2021-05-06', '1020101', 'Cash in Hand For Supplier Max', '0.00', '2400000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:03:02', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (135, '20210506180302', NULL, 'Purchase', '2021-05-06', '502020001', 'Supplier .Max', '2400000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (136, '7317592698', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1024', '0.00', '12000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:43:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (137, '7317592698', NULL, 'INV', '2021-05-06', '1020301', 'Customer debit For Invoice No -  1024 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:43:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (138, '7317592698', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1024 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:43:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (139, '7317592698', NULL, 'INV', '2021-05-06', '1020301', 'Customer credit for Paid Amount For Customer Invoice NO- 1024 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:43:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (140, '7317592698', NULL, 'INV', '2021-05-06', '1020101', 'Cash in Hand in Sale for Invoice No - 1024 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 18:43:07', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (141, '4677891443', NULL, 'INV', '2021-05-06', '10107', 'Inventory credit For Invoice No1025', '0.00', '64000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:02:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (142, '4677891443', NULL, 'INV', '2021-05-06', '102030100001', 'Customer debit For Invoice No -  1025 Customer Helen', '80000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:02:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (143, '4677891443', NULL, 'INVOICE', '2021-05-06', '303', 'Sale Income For Invoice NO - 1025 Customer Helen', '0.00', '80000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:02:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (144, '4677891443', NULL, 'INV', '2021-05-06', '102030100001', 'Customer credit for Paid Amount For Customer Invoice NO- 1025 Customer- Helen', '0.00', '80000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:02:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (145, '4677891443', NULL, 'INV', '2021-05-06', '1020101', 'Cash in Hand in Sale for Invoice No - 1025 customer- Helen', '80000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:02:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (146, '55W5QZTLJW', NULL, 'LNR', '2021-05-06', '10203020001', 'Loan for .Mainul', '2000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:08:32', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (147, '55W5QZTLJW', NULL, 'LNR', '2021-05-06', '1020101', 'Cash in Hand Credit For Mainul', '0.00', '2000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-06 19:08:32', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (148, '3596542794', NULL, 'INV', '2021-05-07', '10107', 'Inventory credit For Invoice No1026', '0.00', '22166.67', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 10:42:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (149, '3596542794', NULL, 'INV', '2021-05-07', '102030000001', 'Customer debit For Invoice No -  1026 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 10:42:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (150, '3596542794', NULL, 'INVOICE', '2021-05-07', '303', 'Sale Income For Invoice NO - 1026 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 10:42:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (151, '3596542794', NULL, 'INV', '2021-05-07', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1026 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 10:42:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (152, '3596542794', NULL, 'INV', '2021-05-07', '1020101', 'Cash in Hand in Sale for Invoice No - 1026 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 10:42:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (153, '20210507110815', NULL, 'Purchase', '2021-05-07', '10107', 'Inventory Debit For Supplier Max', '6000000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 11:08:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (154, '20210507110815', NULL, 'Purchase', '2021-05-07', '502020001', 'Supplier .Max', '0.00', '6000000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (155, '20210507110815', NULL, 'Purchase', '2021-05-07', '402', 'Company Credit For  Max', '6000000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 11:08:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (156, '20210507110815', NULL, 'Purchase', '2021-05-07', '1020101', 'Cash in Hand For Supplier Max', '0.00', '6000000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 11:08:15', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (157, '20210507110815', NULL, 'Purchase', '2021-05-07', '502020001', 'Supplier .Max', '6000000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (158, 'MR-1', NULL, 'MR', '2021-05-07', '102030000009', 'Money receipt for Paid Amount Customer 17-Leo Messi ', '0.00', '1200.00', '1', NULL, '2021-05-07 16:16:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (159, 'MR-2', NULL, 'MR', '2021-05-07', '102030000009', 'Money receipt for Paid Amount Customer 17-Leo Messi ', '0.00', '1000.00', '1', NULL, '2021-05-07 16:18:40', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (160, 'MR-3', NULL, 'MR', '2021-05-07', '102030000009', 'Money receipt for Paid Amount Customer 17-Leo Messi ', '0.00', '2000.00', '1', NULL, '2021-05-07 16:27:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (161, 'MR-3', NULL, 'MR', '2021-05-07', '1020101', 'Cash in Hand for Money Receipt -MR Customer 17-Leo Messi', '2000.00', '0.00', '1', NULL, '2021-05-07 16:27:58', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (162, 'MR-4', NULL, 'MR', '2021-05-07', '102030000009', 'Money receipt for Paid Amount Customer 17-Leo Messi ', '0.00', '30000.00', '1', NULL, '2021-05-07 16:31:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (163, 'MR-4', NULL, 'MR', '2021-05-07', '1020102', 'Cash in Bank amount for customer  Money Receipt  No - MR Customer 17-Leo MessiinEBL Bank', '30000.00', '0.00', '1', NULL, '2021-05-07 16:31:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (164, '20210507192128', NULL, 'Purchase', '2021-05-07', '10107', 'Inventory Debit For Supplier Shenzhen Mindray Bio-Medical Electronics Co., Ltd', '146.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 19:21:28', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (165, '20210507192128', NULL, 'Purchase', '2021-05-07', '5020003', 'Supplier .Shenzhen Mindray Bio-Medical Electronics Co., Ltd', '0.00', '146.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (166, '20210507192128', NULL, 'Purchase', '2021-05-07', '402', 'Company Credit For  Shenzhen Mindray Bio-Medical Electronics Co., Ltd', '146.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 19:21:28', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (167, '20210507192128', NULL, 'Purchase', '2021-05-07', '1020101', 'Cash in Hand For Supplier Shenzhen Mindray Bio-Medical Electronics Co., Ltd', '0.00', '146.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 19:21:28', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (168, '20210507192128', NULL, 'Purchase', '2021-05-07', '5020003', 'Supplier .Shenzhen Mindray Bio-Medical Electronics Co., Ltd', '146.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-07 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (169, '5525882815', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1027', '0.00', '44216.22', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:22:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (170, '5525882815', NULL, 'INV', '2021-05-08', '102030000001', 'Customer debit For Invoice No -  1027 Customer Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:22:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (171, '5525882815', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1027 Customer Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:22:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (172, '5525882815', NULL, 'INV', '2021-05-08', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1027 Customer- Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:22:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (173, '5525882815', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand in Sale for Invoice No - 1027 customer- Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:22:19', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (174, '2787634453', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1028', '0.00', '22052.63', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:31:23', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (175, '2787634453', NULL, 'INV', '2021-05-08', '102030000001', 'Customer debit For Invoice No -  1028 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:31:23', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (176, '2787634453', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1028 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:31:23', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (177, '2787634453', NULL, 'INV', '2021-05-08', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1028 Customer- Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:31:23', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (178, '2787634453', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand in Sale for Invoice No - 1028 customer- Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:31:23', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (179, '6638297212', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1029', '0.00', '66000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:33:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (180, '6638297212', NULL, 'INV', '2021-05-08', '102030000001', 'Customer debit For Invoice No -  1029 Customer Walking Customer', '60000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:33:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (181, '6638297212', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1029 Customer Walking Customer', '0.00', '60000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:33:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (182, '6638297212', NULL, 'INV', '2021-05-08', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1029 Customer- Walking Customer', '0.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:33:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (183, '6638297212', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand in Sale for Invoice No - 1029 customer- Walking Customer', '0.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:33:20', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (189, '3278557576', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1030', '0.00', '37950.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (190, '3278557576', NULL, 'INV', '2021-05-08', '102030000001', 'Customer debit For Invoice No -  1030 Customer Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (191, '3278557576', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1030 Customer Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (192, '3278557576', NULL, 'INV', '2021-05-08', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1030 Customer- Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (193, '3278557576', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand in Sale for Invoice No - 1030 customer- Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 08:59:24', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (204, '9884721351', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1002', '0.00', '65707.32', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 09:54:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (205, '9884721351', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income From Invoice NO - 1002 Customer Rifat', '0.00', '60000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 09:54:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (206, '9884721351', NULL, 'INV', '2021-05-08', '102030000003', 'Customer debit For Invoice NO - 1002 customer-  Rifat', '60000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 09:54:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (207, '9884721351', NULL, 'INV', '2021-05-08', '102030000003', 'Customer credit for Paid Amount For Invoice No -1002 Customer Rifat', '0.00', '60000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 09:54:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (208, '9884721351', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand for sale for Invoice No -1002 Customer Rifat', '60000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 09:54:01', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (209, '2945262316', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1031', '0.00', '21902.44', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 10:00:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (210, '2945262316', NULL, 'INV', '2021-05-08', '102030000001', 'Customer debit For Invoice No -  1031 Customer Walking Customer', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 10:00:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (211, '2945262316', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1031 Customer Walking Customer', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 10:00:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (212, '9817814336', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1000', '0.00', '21857.14', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 12:47:33', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (213, '9817814336', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income From Invoice NO - 1000 Customer Rifat', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 12:47:33', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (214, '1659565657', NULL, 'INV', '2021-05-08', '10107', 'Inventory credit For Invoice No1032', '0.00', '21857.14', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 15:50:29', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (215, '1659565657', NULL, 'INV', '2021-05-08', '102030000009', 'Customer debit For Invoice No -  1032 Customer Leo Messi', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 15:50:29', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (216, '1659565657', NULL, 'INVOICE', '2021-05-08', '303', 'Sale Income For Invoice NO - 1032 Customer Leo Messi', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 15:50:29', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (217, '1659565657', NULL, 'INV', '2021-05-08', '102030000009', 'Customer credit for Paid Amount For Customer Invoice NO- 1032 Customer- Leo Messi', '0.00', '-14200.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 15:50:29', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (218, '1659565657', NULL, 'INV', '2021-05-08', '1020101', 'Cash in Hand in Sale for Invoice No - 1032 customer- Leo Messi', '-14200.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-08 15:50:29', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (219, '20210509115748', NULL, 'Purchase', '2021-05-09', '10107', 'Inventory Debit For Supplier Max', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:57:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (220, '20210509115748', NULL, 'Purchase', '2021-05-09', '502020001', 'Supplier .Max', '0.00', '1200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (221, '20210509115748', NULL, 'Purchase', '2021-05-09', '402', 'Company Credit For  Max', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:57:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (222, '20210509115748', NULL, 'Purchase', '2021-05-09', '1020101', 'Cash in Hand For Supplier Max', '0.00', '1200000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:57:48', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (223, '20210509115748', NULL, 'Purchase', '2021-05-09', '502020001', 'Supplier .Max', '1200000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 00:00:00', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (224, '2563871465', NULL, 'INV', '2021-05-09', '10107', 'Inventory credit For Invoice No1033', '0.00', '32000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:58:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (225, '2563871465', NULL, 'INV', '2021-05-09', '102030000001', 'Customer debit For Invoice No -  1033 Customer Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:58:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (226, '2563871465', NULL, 'INVOICE', '2021-05-09', '303', 'Sale Income For Invoice NO - 1033 Customer Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:58:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (227, '2563871465', NULL, 'INV', '2021-05-09', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1033 Customer- Walking Customer', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:58:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (228, '2563871465', NULL, 'INV', '2021-05-09', '1020101', 'Cash in Hand in Sale for Invoice No - 1033 customer- Walking Customer', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 11:58:49', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (229, '5971435433', NULL, 'INV', '2021-05-09', '10107', 'Inventory credit For Invoice No1034', '0.00', '82857.14', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 12:08:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (230, '5971435433', NULL, 'INV', '2021-05-09', '102030000001', 'Customer debit For Invoice No -  1034 Customer Walking Customer', '100000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 12:08:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (231, '5971435433', NULL, 'INVOICE', '2021-05-09', '303', 'Sale Income For Invoice NO - 1034 Customer Walking Customer', '0.00', '100000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 12:08:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (232, '5971435433', NULL, 'INV', '2021-05-09', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1034 Customer- Walking Customer', '0.00', '100000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 12:08:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (233, '5971435433', NULL, 'INV', '2021-05-09', '1020101', 'Cash in Hand in Sale for Invoice No - 1034 customer- Walking Customer', '100000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-09 12:08:46', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (234, '3794749962', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1035', '0.00', '109069.77', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:53:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (235, '3794749962', NULL, 'INV', '2021-05-11', '102030000001', 'Customer debit For Invoice No -  1035 Customer Walking Customer', '100000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:53:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (236, '3794749962', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1035 Customer Walking Customer', '0.00', '100000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:53:52', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (237, '9686449863', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1036', '0.00', '87090.91', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:55:27', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (238, '9686449863', NULL, 'INV', '2021-05-11', '102030000001', 'Customer debit For Invoice No -  1036 Customer Walking Customer', '80000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:55:27', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (239, '9686449863', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1036 Customer Walking Customer', '0.00', '80000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:55:27', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (240, '9686449863', NULL, 'INV', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1036 Customer- Walking Customer', '0.00', '80000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:55:27', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (241, '9686449863', NULL, 'INVOICE', '2021-05-11', '102010201', 'Paid amount for customer  Invoice No - 1036 customer -Walking Customer', '80000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 08:55:27', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (242, '1383352626', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1037', '0.00', '21733.33', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:02:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (243, '1383352626', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1037 Customer Rifat', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:02:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (244, '9322643114', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1038', '0.00', '151869.57', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:07:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (245, '9322643114', NULL, 'INV', '2021-05-11', '102030000001', 'Customer debit For Invoice No -  1038 Customer Walking Customer', '140000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:07:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (246, '9322643114', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1038 Customer Walking Customer', '0.00', '140000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:07:03', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (247, '8161128561', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1039', '0.00', '64978.72', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:09:47', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (248, '8161128561', NULL, 'INV', '2021-05-11', '102030000001', 'Customer debit For Invoice No -  1039 Customer Walking Customer', '60000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:09:47', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (249, '8161128561', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1039 Customer Walking Customer', '0.00', '60000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:09:47', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (250, '8161128561', NULL, 'INV', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Customer Invoice NO- 1039 Customer- Walking Customer', '0.00', '60000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:09:47', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (251, '8161128561', NULL, 'INVOICE', '2021-05-11', '102010201', 'Paid amount for customer  Invoice No - 1039 customer -Walking Customerin-Standard Chartered Bank', '60000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:09:47', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (252, '1938854338', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1040', '0.00', '21625.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:11:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (253, '1938854338', NULL, 'INV', '2021-05-11', '102030000003', 'Customer debit For Invoice No -  1040 Customer Rifat', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:11:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (254, '1938854338', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1040 Customer Rifat', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:11:45', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (255, 'serv-20210511093509', NULL, 'SERVICE', '2021-05-11', '304', 'Service Income For SERVICE No serv-20210511093509', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:35:09', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (256, 'serv-20210511093509', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer debit For service No serv-20210511093509', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:35:09', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (257, 'serv-20210511093509', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210511093509', '0.00', '361000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:35:09', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (258, 'serv-20210511093509', NULL, 'SERVICE', '2021-05-11', '1020101', 'Cash in Hand For SERVICE No serv-20210511093509', '361000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 09:35:09', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (259, '7783187386', NULL, 'INV', '2021-05-11', '10107', 'Inventory credit For Invoice No1041', '0.00', '21591.84', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 12:08:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (260, '7783187386', NULL, 'INV', '2021-05-11', '102030000003', 'Customer debit For Invoice No -  1041 Customer Rifat', '20000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 12:08:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (261, '7783187386', NULL, 'INVOICE', '2021-05-11', '303', 'Sale Income For Invoice NO - 1041 Customer Rifat', '0.00', '20000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 12:08:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (262, '7783187386', NULL, 'INV', '2021-05-11', '102030000003', 'Customer credit for Paid Amount For Customer Invoice NO- 1041 Customer- Rifat', '0.00', '40000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 12:08:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (263, '7783187386', NULL, 'INV', '2021-05-11', '1020101', 'Cash in Hand in Sale for Invoice No - 1041 customer- Rifat', '40000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 12:08:36', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (264, 'serv-20210511073026', NULL, 'SERVICE', '2021-05-11', '304', 'Service Income For SERVICE No serv-20210511073026', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:30:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (265, 'serv-20210511073026', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer debit For service No serv-20210511073026', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:30:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (266, 'serv-20210511073026', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210511073026', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:30:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (267, 'serv-20210511073026', NULL, 'SERVICE', '2021-05-11', '1020101', 'Cash in Hand For SERVICE No serv-20210511073026', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:30:26', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (268, 'serv-20210511073238', NULL, 'SERVICE', '2021-05-11', '304', 'Service Income For SERVICE No serv-20210511073238', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:32:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (269, 'serv-20210511073238', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer debit For service No serv-20210511073238', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:32:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (270, 'serv-20210511073238', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210511073238', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:32:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (271, 'serv-20210511073238', NULL, 'SERVICE', '2021-05-11', '102010201', 'Cash in bank For SERVICE No serv-20210511073238', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:32:38', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (272, 'serv-20210511073441', NULL, 'SERVICE', '2021-05-11', '304', 'Service Income For SERVICE No serv-20210511073441', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:34:41', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (273, 'serv-20210511073441', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer debit For service No serv-20210511073441', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:34:41', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (274, 'serv-20210511073441', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210511073441', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:34:41', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (275, 'serv-20210511073718', NULL, 'SERVICE', '2021-05-11', '304', 'Service Income For SERVICE No serv-20210511073718', '0.00', '100.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:37:18', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (276, 'serv-20210511073718', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer debit For service No serv-20210511073718', '100.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:37:18', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (277, 'serv-20210511073718', NULL, 'SERVICE', '2021-05-11', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210511073718', '0.00', '100.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:37:18', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (278, 'serv-20210511073718', NULL, 'INVOICE', '2021-05-11', '102010212', 'Cash in bkash For SERVICE No serv-20210511073718', '100.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-11 19:37:18', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (279, 'serv-20210512082413', NULL, 'SERVICE', '2021-05-12', '304', 'Service Income For SERVICE No serv-20210512082413', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 08:24:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (280, 'serv-20210512082413', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer debit For service No serv-20210512082413', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 08:24:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (281, 'serv-20210512082413', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210512082413', '0.00', '1000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 08:24:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (282, 'serv-20210512082413', NULL, 'SERVICE', '2021-05-12', '1020101', 'Cash in Hand For SERVICE No serv-20210512082413', '1000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 08:24:13', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (283, 'serv-20210512093953', NULL, 'SERVICE', '2021-05-12', '304', 'Service Income For SERVICE No serv-20210512093953', '0.00', '2000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:39:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (284, 'serv-20210512093953', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer debit For service No serv-20210512093953', '2000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:39:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (285, 'serv-20210512093953', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210512093953', '0.00', '2000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:39:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (286, 'serv-20210512093953', NULL, 'SERVICE', '2021-05-12', '102010201', 'Cash in bank For SERVICE No serv-20210512093953', '2000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:39:53', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (287, 'serv-20210512094105', NULL, 'SERVICE', '2021-05-12', '304', 'Service Income For SERVICE No serv-20210512094105', '0.00', '3000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:41:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (288, 'serv-20210512094105', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer debit For service No serv-20210512094105', '3000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:41:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (289, 'serv-20210512094105', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210512094105', '0.00', '3000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:41:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (290, 'serv-20210512094105', NULL, 'INVOICE', '2021-05-12', '102010212', 'Cash in bkash For SERVICE No serv-20210512094105', '3000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:41:05', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (291, 'serv-20210512094242', NULL, 'SERVICE', '2021-05-12', '304', 'Service Income For SERVICE No serv-20210512094242', '0.00', '10000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:42:42', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (292, 'serv-20210512094242', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer debit For service No serv-20210512094242', '10000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:42:42', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (293, 'serv-20210512094242', NULL, 'SERVICE', '2021-05-12', '102030000001', 'Customer credit for Paid Amount For Service No serv-20210512094242', '0.00', '10000.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:42:42', NULL, NULL, '1');
INSERT INTO `acc_transaction` (`ID`, `VNo`, `cheque_id`, `Vtype`, `VDate`, `COAID`, `Narration`, `Debit`, `Credit`, `IsPosted`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`, `IsAppove`) VALUES (294, 'serv-20210512094242', NULL, 'SERVICE', '2021-05-12', '102010201', 'Cash in bank For SERVICE No serv-20210512094242', '10000.00', '0.00', '1', 'OpSoxJvBbbS8Rws', '2021-05-12 09:42:42', NULL, NULL, '1');


#
# TABLE STRUCTURE FOR: app_setting
#

DROP TABLE IF EXISTS `app_setting`;

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `localhserver` varchar(250) DEFAULT NULL,
  `onlineserver` varchar(250) DEFAULT NULL,
  `hotspot` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `app_setting` (`id`, `localhserver`, `onlineserver`, `hotspot`) VALUES (1, 'https://www.devenport.co/erp', 'https://www.devenport.co/erp', 'https://192.168.1.167/saleserp');


#
# TABLE STRUCTURE FOR: attendance
#

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sign_in` varchar(30) NOT NULL,
  `sign_out` varchar(30) NOT NULL,
  `staytime` varchar(30) NOT NULL,
  PRIMARY KEY (`att_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `attendance` (`att_id`, `employee_id`, `date`, `sign_in`, `sign_out`, `staytime`) VALUES (1, 1, '2020-09-06', '02:49 AM', '', '');
INSERT INTO `attendance` (`att_id`, `employee_id`, `date`, `sign_in`, `sign_out`, `staytime`) VALUES (3, 2, '2021-01-30', '12:54 PM', '12:57 PM', '00:03');


#
# TABLE STRUCTURE FOR: bank_add
#

DROP TABLE IF EXISTS `bank_add`;

CREATE TABLE `bank_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(250) DEFAULT NULL,
  `ac_number` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `signature_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (3, 'L3FNC8O9AD', 'Standard Chartered Bank', 'Global Medical Engineering (Bd) Ltd.', '01-1321276-06', 'Santinagar', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (4, '48HKF445U2', 'First Security Islami Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '118-111-00003669', 'Topkhana Road, Dhaka', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (5, 'ZLMBIJ613L', 'Mercantile Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '113311110696107', 'Bijoynagar', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (6, 'LA4Q1O8TKP', 'Janata Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '0100018639852', 'Topkhana Road, Corporate Branch, Dhaka', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (7, 'RE6KT2S6HX', 'United Commercial Bank Ltd (UCBL)', 'Global Medical Engineering (Bd) Ltd.', '0012101000002408', 'Principal Branch', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (8, 'E8ARJCZJLO', 'Eastern Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '1141350167398', 'Kakrail', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (9, 'HVPJ55DBIA', 'Islami Bank Bangladesh Ltd.', 'G. Medical Engineering.', '20502260100182917', 'Rampura, Dhaka', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (10, 'XSTZSOYM1W', 'Brac Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '1513203777986001', 'Motijheel', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (11, 'BZ4JQMVVGL', 'Brac Bank Ltd.', 'G. Medical Engineering.', '1520201881818001', 'Eskaton', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (12, 'YNHXVVGFA4', 'Brac Bank Ltd.', 'Tarikul Islam', '1503101314261001', 'Maghbazar', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (13, '7WNZ9K7UWR', 'The City Bank Ltd.', 'Global Medical Engineering (Bd) Ltd.', '1232753345001', 'B.B Avenue Branch', NULL, 1);
INSERT INTO `bank_add` (`id`, `bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES (14, 'Z2IOVDAGPP', 'The City Bank Ltd.', 'Tarikul Islam', '2401890308001', 'B B Avenue', NULL, 1);


#
# TABLE STRUCTURE FOR: bkash_add
#

DROP TABLE IF EXISTS `bkash_add`;

CREATE TABLE `bkash_add` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bkash_id` varchar(255) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `bkash_no` varchar(255) NOT NULL,
  `bkash_type` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (1, 'PWV6PD84BD', 'Arman', '01836281773', 'Personal', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (2, 'LY7DO52OAJ', 'Md Arman', '01787281564', 'Agent', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (3, 'XYBORW6VTS', 'Irfan', '01819113991', 'Merchant', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (4, 'Z5OIN7JBGI', 'Arman Ullah', '01836714343', 'Personal', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (5, '4SKMHSFXKW', 'Leo Messi', '0124567355', 'Personal', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (6, 'KHL1ROAY71', 'Irfan Ullah', '011111111111', 'Personal', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (7, 'N8ST38QA39', 'Mom', '01913613207', 'Personal', 1);
INSERT INTO `bkash_add` (`id`, `bkash_id`, `ac_name`, `bkash_no`, `bkash_type`, `status`) VALUES (8, '1RS5SFEXGQ', 'Arman Ullah', '01836714343', 'Merchant', 1);


#
# TABLE STRUCTURE FOR: branch_name
#

DROP TABLE IF EXISTS `branch_name`;

CREATE TABLE `branch_name` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(255) NOT NULL,
  `courier_id` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courier_id` (`courier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `branch_name` (`id`, `branch_id`, `courier_id`, `branch_name`, `status`) VALUES (2, 'PCCU315Q1UOURHK', 'PCCU315Q1UOURHK', 'Hathaazari', 1);
INSERT INTO `branch_name` (`id`, `branch_id`, `courier_id`, `branch_name`, `status`) VALUES (3, 'WTUPWGTSKR54OHL', 'V1PDX12HZ8SY9LE', 'Muradpur', 1);
INSERT INTO `branch_name` (`id`, `branch_id`, `courier_id`, `branch_name`, `status`) VALUES (4, '26GI7X6U36TVVA8', 'DVHTURXJF7BGEHT', 'East Nasirabad', 1);


#
# TABLE STRUCTURE FOR: company_information
#

DROP TABLE IF EXISTS `company_information`;

CREATE TABLE `company_information` (
  `company_id` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email2` varchar(1000) DEFAULT NULL,
  `address` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `website` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `company_information` (`company_id`, `company_name`, `email`, `email2`, `address`, `mobile`, `phone`, `website`, `status`) VALUES ('1', 'Global Medical Engineering (BD) Ltd', 'gmebd@gmail.com', 'gmebd2@gmail.com', '17/2, Topkhana Road (2nd Floor) Dhaka – 1000, Bangladesh.', '01822911624', '01467754378', 'https://gmebd.com', 1);


#
# TABLE STRUCTURE FOR: courier_name
#

DROP TABLE IF EXISTS `courier_name`;

CREATE TABLE `courier_name` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `courier_id` varchar(255) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `courier_name` (`id`, `courier_id`, `courier_name`, `status`) VALUES (2, 'V1PDX12HZ8SY9LE', 'Sundarban Courier', 1);
INSERT INTO `courier_name` (`id`, `courier_id`, `courier_name`, `status`) VALUES (3, 'DVHTURXJF7BGEHT', 'S.A Paribahan', 1);


#
# TABLE STRUCTURE FOR: currency_tbl
#

DROP TABLE IF EXISTS `currency_tbl`;

CREATE TABLE `currency_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) NOT NULL,
  `icon` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES (1, 'Dollar', '$');
INSERT INTO `currency_tbl` (`id`, `currency_name`, `icon`) VALUES (2, 'BDT', 'Tk');


#
# TABLE STRUCTURE FOR: cus_cheque
#

DROP TABLE IF EXISTS `cus_cheque`;

CREATE TABLE `cus_cheque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) DEFAULT NULL,
  `cheque_id` varchar(1000) DEFAULT NULL,
  `cheque_type` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `cheque_date` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` varchar(1000) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (1, '8651763152', '4556632282', 'Installment', '867545468', '2021-05-01', '2000', '2021-05-01', 1);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (2, '9619847637', '5275328638', 'Installment', '65754326767', '2021-05-01', '5000', '2021-05-01', 1);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (3, '9389624558', '5768463863', 'Installment', '456789049394', '2021-05-21', '3000', '2021-05-01', 1);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (4, '1452189928', '7182788559', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (5, '9817814336', '1272353572', 'Installment', '456878775', '2021-05-04', '2000', '2021-05-04', 1);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (6, '9817814336', '7943426891', 'Installment', '7654778776', '2021-05-04', '1000', '2021-05-04', 1);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (7, '9884721351', '3539964836', '23456789', '4321167', '2021-05-04', '4000', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (8, '8613692778', '6878383961', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (9, '5624342686', '3419195968', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (10, '6638297212', '1773877417', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (11, '2945262316', '8437425158', 'Installment', '3546768', '2021-05-08', '2000', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (12, '1659565657', '7268969161', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (13, '3794749962', '8414128281', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (14, '1383352626', '5811868748', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (15, '9322643114', '7743146233', '', '', '', '0', NULL, 2);
INSERT INTO `cus_cheque` (`id`, `invoice_id`, `cheque_id`, `cheque_type`, `cheque_no`, `cheque_date`, `amount`, `payment_date`, `status`) VALUES (16, '1938854338', '8257614855', '', '', '', '0', NULL, 2);


#
# TABLE STRUCTURE FOR: customer_information
#

DROP TABLE IF EXISTS `customer_information`;

CREATE TABLE `customer_information` (
  `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id_two` varchar(255) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) NOT NULL,
  `address2` text NOT NULL,
  `customer_mobile` varchar(100) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `contact_person` varchar(1000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `discount_customer` int(255) DEFAULT NULL,
  `website` varchar(1000) DEFAULT NULL,
  `status` int(2) NOT NULL COMMENT '1=paid,2=credit',
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_id_two` (`customer_id_two`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('1', '', 'Walking Customer', ' dhaka ', 'baridhara', '01787281564', 'customer@gmebd.com', 'customer@gmebd.com', '0808090909', '', '0808090909', 'fax', 'Dhaka', 'Dhaka', '4000', 'Bangladesh', 0, NULL, 1, '2020-10-30 19:24:47', 'tF2YChLBH86gHfG');
INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('11', 'GME002', 'Rifat', '', '', '01521484948', '', '', '', '', '', '', '', '', '', '', 0, NULL, 1, '2021-01-25 13:54:26', 'tF2YChLBH86gHfG');
INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('2', 'GME003', 'Rifat', '', '', '0182628262465', '', '', '', '', '', '', '', '', '', '', 0, NULL, 1, '2021-01-25 13:54:26', 'tF2YChLBH86gHfG');
INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('16', '1234', 'Mizbah', 'Hathazrai,chittgaong', 'Hathazari', '01787281564', 'engsol2020@gmail.com', 'engsol2020@gmail.com', '01521484948', 'Engineering Solution', '01521484948', '', 'Chittagong', '', '6543', 'Afghanistan', NULL, '', 1, '2021-03-31 11:43:49', 'OpSoxJvBbbS8Rws');
INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('17', 'GME221', 'Leo Messi', 'CTG', 'CTG', '018272536383', 'amd55077@gmail.com', 'amd55077@gmail.com', '01787281564', 'Elkora', '01787281564', '2234556', 'Chittagong', 'Chittagong', '4330', 'Bangladesh', NULL, 'https://www.facebook.com/mdarmancse/', 1, '2021-05-01 14:04:42', 'OpSoxJvBbbS8Rws');
INSERT INTO `customer_information` (`customer_id`, `customer_id_two`, `customer_name`, `customer_address`, `address2`, `customer_mobile`, `customer_email`, `email_address`, `contact`, `contact_person`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `discount_customer`, `website`, `status`, `create_date`, `create_by`) VALUES ('18', 'FFD', 'Helen', 'Hathazrai,chittgaong', '', '083638393', 'irfamna@gmail.com', 'irfamna@gmail.com', '0736347', 'Irfan Ullah', '0736347', '8663', 'Chittagong', 'Nowakhali', '6543', 'Afghanistan', NULL, '', 1, '2021-05-06 22:42:33', 'OpSoxJvBbbS8Rws');


#
# TABLE STRUCTURE FOR: daily_banking_add
#

DROP TABLE IF EXISTS `daily_banking_add`;

CREATE TABLE `daily_banking_add` (
  `banking_id` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: daily_closing
#

DROP TABLE IF EXISTS `daily_closing`;

CREATE TABLE `daily_closing` (
  `closing_id` varchar(255) NOT NULL,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `daily_closing` (`closing_id`, `last_day_closing`, `cash_in`, `cash_out`, `date`, `amount`, `adjustment`, `status`) VALUES ('1696745417', '0', '160000', '0', '2021-05-08', '160000', NULL, 1);


#
# TABLE STRUCTURE FOR: designation
#

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(150) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `designation` (`id`, `designation`, `details`) VALUES (2, 'Assistant General Manager', '');


#
# TABLE STRUCTURE FOR: discount
#

DROP TABLE IF EXISTS `discount`;

CREATE TABLE `discount` (
  `discount_id` int(255) NOT NULL AUTO_INCREMENT,
  `customer` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `discount_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `discount` (`discount_id`, `customer`, `category`, `discount_percentage`) VALUES (5, '17', 'VGIJYRWZF4AYB1Y', '20.00');


#
# TABLE STRUCTURE FOR: email_config
#

DROP TABLE IF EXISTS `email_config`;

CREATE TABLE `email_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocol` text NOT NULL,
  `smtp_host` text NOT NULL,
  `smtp_port` text NOT NULL,
  `smtp_user` varchar(35) NOT NULL,
  `smtp_pass` varchar(35) NOT NULL,
  `mailtype` varchar(30) DEFAULT NULL,
  `isinvoice` tinyint(4) NOT NULL,
  `isservice` tinyint(4) NOT NULL,
  `isquotation` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `email_config` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `mailtype`, `isinvoice`, `isservice`, `isquotation`) VALUES (1, 'smtp', 'smtp.gmail.com', '25', 'devenportbd@gmail.com', '5million$', 'html', 1, 1, 1);


#
# TABLE STRUCTURE FOR: employee_academic
#

DROP TABLE IF EXISTS `employee_academic`;

CREATE TABLE `employee_academic` (
  `ac_id` int(255) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `passing_year` varchar(255) DEFAULT NULL,
  `result` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO `employee_academic` (`ac_id`, `employee_id`, `degree`, `institution`, `subject`, `passing_year`, `result`) VALUES (51, 'GMEBD002', 'SSC', 'HPHS', 'Science', '2012', '5.00');
INSERT INTO `employee_academic` (`ac_id`, `employee_id`, `degree`, `institution`, `subject`, `passing_year`, `result`) VALUES (52, 'GMEBD002', 'HSC', 'CUC', 'ARTS', '2014', '5.00');


#
# TABLE STRUCTURE FOR: employee_ex
#

DROP TABLE IF EXISTS `employee_ex`;

CREATE TABLE `employee_ex` (
  `ex_id` int(255) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO `employee_ex` (`ex_id`, `employee_id`, `company`, `des`, `duration`) VALUES (34, 'GMEBD002', '3S', 'Software Engineer', '3 years');
INSERT INTO `employee_ex` (`ex_id`, `employee_id`, `company`, `des`, `duration`) VALUES (35, 'GMEBD002', 'KDAIT', 'Software Engineer', '3 years');


#
# TABLE STRUCTURE FOR: employee_history
#

DROP TABLE IF EXISTS `employee_history`;

CREATE TABLE `employee_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `rate_type` int(11) DEFAULT NULL,
  `hrate` float DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `address_line_1` text DEFAULT NULL,
  `address_line_2` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `training` varchar(1000) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `nid_number` varchar(1000) DEFAULT NULL,
  `nominee_name` varchar(255) DEFAULT NULL,
  `nominee_nid` varchar(1000) DEFAULT NULL,
  `nominee_image` varchar(1000) DEFAULT NULL,
  `nominee_phone` varchar(255) DEFAULT NULL,
  `gua_name` varchar(255) DEFAULT NULL,
  `gua_nid` varchar(1000) DEFAULT NULL,
  `gua_profession` varchar(255) DEFAULT NULL,
  `gua_image` varchar(1000) DEFAULT NULL,
  `gua_phone` varchar(1000) DEFAULT NULL,
  `fam_name` varchar(255) DEFAULT NULL,
  `fam_nid` varchar(255) DEFAULT NULL,
  `fam_profession` varchar(255) DEFAULT NULL,
  `fam_relation` varchar(255) DEFAULT NULL,
  `fam_image` varchar(255) DEFAULT NULL,
  `fam_phone` varchar(255) DEFAULT NULL,
  `dar` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `employee_history` (`id`, `employee_id`, `first_name`, `last_name`, `designation`, `phone`, `dob`, `rate_type`, `hrate`, `email`, `blood_group`, `address_line_1`, `address_line_2`, `image`, `country`, `city`, `zip`, `department`, `age`, `training`, `father_name`, `mother_name`, `nid_number`, `nominee_name`, `nominee_nid`, `nominee_image`, `nominee_phone`, `gua_name`, `gua_nid`, `gua_profession`, `gua_image`, `gua_phone`, `fam_name`, `fam_nid`, `fam_profession`, `fam_relation`, `fam_image`, `fam_phone`, `dar`) VALUES (25, 'GMEBD002', 'Arman', 'Ullah', '2', '88', '2021-03-23', 1, '44', 'sunny@gmail.com', 'A+', 're', 'df', 'https://localhost/gmebd/gmebd/my-assets/image/employee/40fce6f084164ab9c85f163dc70768eb.jpeg', 'Australia', 'Chittagong', '4330', 'CSE', '34', 'PHP', 'Jainal Abedin', 'SHahjin', '7766889', 'Uthas', '979774553', NULL, '56', 'ADDDD', '4657657657', 'AA', 'https://localhost/gmebd/gmebd/my-assets/image/employee/3460eda292c4289cecb674e816353009.jpeg', '5435435', 'Ahasan', '456789', 'Software Developer', 'Brother', 'https://localhost/gmebd/gmebd/my-assets/image/employee/77f2e57e1e0b5ed3ffaf842f8bbfe6df.png', '543543501787291675', 'gfhgfhfg');


#
# TABLE STRUCTURE FOR: employee_salary_payment
#

DROP TABLE IF EXISTS `employee_salary_payment`;

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `generate_id` int(11) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_salary` decimal(18,2) NOT NULL DEFAULT 0.00,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  `salary_month` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`emp_sal_pay_id`),
  KEY `employee_id` (`employee_id`),
  KEY `generate_id` (`generate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `employee_salary_payment` (`emp_sal_pay_id`, `generate_id`, `employee_id`, `total_salary`, `total_working_minutes`, `working_period`, `payment_due`, `payment_date`, `paid_by`, `salary_month`) VALUES (3, 5, '2', '60000.00', '0', '0', 'paid', '2021-01-28', 'Global Medical', 'January 2021');


#
# TABLE STRUCTURE FOR: employee_salary_setup
#

DROP TABLE IF EXISTS `employee_salary_setup`;

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gross_salary` float NOT NULL,
  PRIMARY KEY (`e_s_s_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (5, '2', '2', '4', '50.00', '2021-01-28', NULL, '', '60000');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (6, '2', '2', '5', '25.00', '2021-01-28', NULL, '', '60000');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (7, '2', '2', '6', '25.00', '2021-01-28', NULL, '', '60000');
INSERT INTO `employee_salary_setup` (`e_s_s_id`, `employee_id`, `sal_type`, `salary_type_id`, `amount`, `create_date`, `update_date`, `update_id`, `gross_salary`) VALUES (8, '2', '2', '7', '0.00', '2021-01-28', NULL, '', '60000');


#
# TABLE STRUCTURE FOR: employee_tr
#

DROP TABLE IF EXISTS `employee_tr`;

CREATE TABLE `employee_tr` (
  `tr_id` int(255) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `tr_centre` varchar(255) DEFAULT NULL,
  `tr_name` varchar(255) DEFAULT NULL,
  `tr_duration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO `employee_tr` (`tr_id`, `employee_id`, `tr_centre`, `tr_name`, `tr_duration`) VALUES (32, 'GMEBD002', 'BITM', 'Laravel,React', '3 month');
INSERT INTO `employee_tr` (`tr_id`, `employee_id`, `tr_centre`, `tr_name`, `tr_duration`) VALUES (33, 'GMEBD002', 'BITM', 'PHP', '3 month');


#
# TABLE STRUCTURE FOR: expense
#

DROP TABLE IF EXISTS `expense`;

CREATE TABLE `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: expense_item
#

DROP TABLE IF EXISTS `expense_item`;

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_item_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: invoice
#

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `customer_name_two` varchar(255) DEFAULT NULL,
  `customer_mobile_two` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total_amount` decimal(18,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prevous_due` decimal(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice` bigint(20) NOT NULL,
  `invoice_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'invoice discount',
  `total_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'total invoice discount',
  `total_tax` decimal(10,2) DEFAULT 0.00,
  `sales_by` varchar(50) NOT NULL,
  `invoice_details` text NOT NULL,
  `status` int(2) NOT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `bkash_id` varchar(255) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `delivery_type` int(11) NOT NULL,
  `courier_id` varchar(255) DEFAULT NULL,
  `branch_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (209, '9817814336', '2', '', '', '2021-05-04', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1000', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 1, 0, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (210, '6236676735', '1', '', '', '2021-05-04', '120000.00', '120000.00', '0.00', '0.00', '0.00', '1001', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (211, '9884721351', '11', '', '', '2021-05-04', '60000.00', '60000.00', '0.00', '0.00', '0.00', '1002', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 1, 0, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (212, '5537139972', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1003', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (213, '4881722577', '1', '', '', '2021-05-05', '200000.00', '200000.00', '0.00', '0.00', '0.00', '1004', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'PWV6PD84BD', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (214, '6295714652', '1', '', '', '2021-05-05', '100000.00', '100000.00', '0.00', '0.00', '0.00', '1005', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'LY7DO52OAJ', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (215, '6721375756', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1006', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'PWV6PD84BD', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (216, '9794571786', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1007', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'PWV6PD84BD', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (217, '5935467793', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1008', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'PWV6PD84BD', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (218, '4664169247', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1009', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'PWV6PD84BD', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (219, '2738126449', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1010', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'LY7DO52OAJ', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (220, '6165572246', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1011', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'LY7DO52OAJ', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (221, '2685339961', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1012', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (222, '8694694793', '1', '', '', '2021-05-05', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1013', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (223, '8342962114', '1', '', '', '2021-05-06', '250000.00', '250000.00', '0.00', '0.00', '0.00', '1014', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (224, '1945198425', '1', '', '', '2021-05-06', '250000.00', '250000.00', '0.00', '0.00', '0.00', '1015', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (225, '4654184897', '1', '', '', '2021-05-06', '250000.00', '250000.00', '0.00', '0.00', '0.00', '1016', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (226, '8613692778', '1', '', '', '2021-05-06', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1017', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (227, '5624342686', '1', '', '', '2021-05-06', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1018', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (228, '2821288466', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1019', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, '4SKMHSFXKW', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (229, '4824233858', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1020', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (230, '6143567251', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1021', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (231, '1896883372', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1022', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'KHL1ROAY71', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (232, '7462669828', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1023', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, 'N8ST38QA39', 3, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (233, '7317592698', '1', '', '', '2021-05-06', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1024', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (234, '4677891443', '18', '', '', '2021-05-06', '80000.00', '80000.00', '0.00', '0.00', '0.00', '1025', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (235, '3596542794', '1', '', '', '2021-05-07', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1026', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (236, '5525882815', '1', '', '', '2021-05-08', '40000.00', '40000.00', '0.00', '0.00', '0.00', '1027', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (237, '2787634453', '1', '', '', '2021-05-08', '20000.00', '20000.00', '0.00', '0.00', '0.00', '1028', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (238, '6638297212', '1', '', '', '2021-05-08', '60000.00', '0.00', '60000.00', '0.00', '0.00', '1029', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (239, '3278557576', '1', '', '', '2021-05-08', '40000.00', '40000.00', '0.00', '0.00', '0.00', '1030', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (240, '2945262316', '1', '', '', '2021-05-08', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1031', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, 'EBL Bank', NULL, 2, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (241, '1659565657', '17', 'Mainul', '9978172541', '2021-05-08', '20000.00', '-14200.00', '0.00', '-34200.00', '0.00', '1032', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (242, '2563871465', '1', '', '', '2021-05-09', '40000.00', '40000.00', '0.00', '0.00', '0.00', '1033', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (243, '5971435433', '1', '', '', '2021-05-09', '100000.00', '100000.00', '0.00', '0.00', '0.00', '1034', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (244, '3794749962', '1', '', '', '2021-05-11', '100000.00', '0.00', '100000.00', '0.00', '0.00', '1035', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, 'EBL bank', NULL, 2, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (245, '9686449863', '1', '', '', '2021-05-11', '80000.00', '80000.00', '0.00', '0.00', '0.00', '1036', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 4, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (246, '1383352626', '2', '', '', '2021-05-11', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1037', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 4, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (247, '9322643114', '1', '', '', '2021-05-11', '140000.00', '0.00', '140000.00', '0.00', '0.00', '1038', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 4, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (248, '8161128561', '1', '', '', '2021-05-11', '60000.00', '60000.00', '0.00', '0.00', '0.00', '1039', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 4, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (249, '1938854338', '11', '', '', '2021-05-11', '20000.00', '0.00', '20000.00', '0.00', '0.00', '1040', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 2, NULL, NULL, 4, 1, NULL, NULL);
INSERT INTO `invoice` (`id`, `invoice_id`, `customer_id`, `customer_name_two`, `customer_mobile_two`, `date`, `total_amount`, `paid_amount`, `due_amount`, `prevous_due`, `shipping_cost`, `invoice`, `invoice_discount`, `total_discount`, `total_tax`, `sales_by`, `invoice_details`, `status`, `bank_id`, `bkash_id`, `payment_type`, `delivery_type`, `courier_id`, `branch_id`) VALUES (250, '7783187386', '11', '', '', '2021-05-11', '20000.00', '40000.00', '0.00', '20000.00', '0.00', '1041', '0.00', '0.00', '0.00', 'OpSoxJvBbbS8Rws', 'Thank you for shopping with us', 1, NULL, NULL, 1, 1, NULL, NULL);


#
# TABLE STRUCTURE FOR: invoice_details
#

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `sn` varchar(1000) DEFAULT NULL,
  `warehouse` varchar(255) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `warrenty_date` varchar(50) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(12,0) DEFAULT NULL,
  `due_amount` decimal(10,2) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (11, '845974657279387', '5537139972', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19428.6', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (42, '597893665617668', '9884721351', '123456', '12345', 'Badda', '', '3.00', '12345', '12345', '20000.00', '21902.4', '60000.00', '0.00', '', '0.00', '60000', '0.00', 0);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (44, '763624529982694', '9817814336', '123456', '12345', 'CTG', '', '1.00', '12345', '12345', '20000.00', '21857.1', '20000.00', '0.00', '', '0.00', '0', '20000.00', 0);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (9, '641873532493994', '6236676735', '123456', '12345', 'CTG', '', '6.00', '', '', '20000.00', '19333.3', '120000.00', '0.00', '', NULL, '120000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (12, '296134632264524', '4881722577', '123456', '12345', 'Badda', '', '10.00', '', '', '20000.00', '19294.1', '200000.00', '0.00', '', NULL, '200000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (13, '136321663561966', '6295714652', '123456', NULL, 'Badda', '', '5.00', '', '', '20000.00', '19333.3', '100000.00', '0.00', '', NULL, '100000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (14, '318286617975474', '9794571786', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19368.4', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (15, '264968764719226', '5935467793', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19400', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (16, '242174523726792', '4664169247', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19428.6', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (17, '467199295449372', '2738126449', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '19454.5', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (18, '282861169776345', '6165572246', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '19478.3', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (19, '468913494827966', '2685339961', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19500', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (20, '529963539366524', '8694694793', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '19520', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (21, '383748693258199', '8342962114', '123456', '12345', 'CTG', '', '5.00', '', '', '50000.00', '19538.5', '250000.00', '0.00', '', NULL, '250000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (22, '254489346372677', '1945198425', '123456', '12345', 'CTG', '', '5.00', '', '', '50000.00', '20666.7', '250000.00', '0.00', '', NULL, '250000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (23, '968241718481792', '4654184897', '123456', '12345', 'CTG', '', '5.00', '', '', '50000.00', '21714.3', '250000.00', '0.00', '', NULL, '250000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (24, '442118711815118', '8613692778', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22689.7', '20000.00', '0.00', '', NULL, '0', '20000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (25, '916966141597332', '5624342686', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22600', '20000.00', '0.00', '', NULL, '0', '20000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (26, '238926516753579', '2821288466', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22516.1', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (27, '161159596138642', '4824233858', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '22437.5', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (28, '817784926913232', '6143567251', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '22363.6', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (29, '911894562933942', '1896883372', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22294.1', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (30, '975449114617193', '7462669828', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22228.6', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (31, '745223931623377', '7317592698', '16185741', '1111111111', 'Gulshan', '', '1.00', '', '', '20000.00', '12000', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (32, '944889624144411', '4677891443', '16185741', '1111111111', 'Gulshan', '', '4.00', '', '', '20000.00', '16000', '80000.00', '0.00', '', NULL, '80000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (33, '661415798946155', '3596542794', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '22166.7', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (34, '429666922388957', '5525882815', '123456', NULL, 'Badda', '', '2.00', '', '', '20000.00', '22108.1', '40000.00', '0.00', '', NULL, '40000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (35, '184889582128329', '2787634453', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '22052.6', '20000.00', '0.00', '', NULL, '20000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (36, '993473213496794', '6638297212', '123456', '12345', 'CTG', '', '3.00', '', '', '20000.00', '22000', '60000.00', '0.00', '', NULL, '0', '60000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (38, '935387251785969', '3278557576', '123456', NULL, 'Badda', '', '1.00', '', '', '20000.00', '21950', '20000.00', '0.00', '', NULL, '40000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (39, '467955972714928', '3278557576', '16185741', NULL, 'a', '', '1.00', '', '', '20000.00', '16000', '20000.00', '0.00', '', NULL, '40000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (43, '528923174494316', '2945262316', '123456', NULL, 'Badda', '', '1.00', '', '', '20000.00', '21902.4', '20000.00', '0.00', '', NULL, '0', '20000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (45, '474117547579433', '1659565657', '123456', NULL, 'Badda', '', '1.00', '', '', '20000.00', '21857.1', '20000.00', '0.00', '', NULL, '-14200', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (46, '262155854392718', '2563871465', '16185741', NULL, 'SZ', '', '2.00', '', '', '20000.00', '16000', '40000.00', '0.00', '', NULL, '40000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (47, '174484871896859', '5971435433', '16185741', NULL, 'SZ', '', '5.00', '', '', '20000.00', '16571.4', '100000.00', '0.00', '', NULL, '100000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (48, '172118227389122', '3794749962', '123456', '12345', 'Badda', '', '5.00', '', '', '20000.00', '21814', '100000.00', '0.00', '', NULL, '0', '100000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (49, '528228566661751', '9686449863', '123456', '12345', 'Badda', '', '4.00', '', '', '20000.00', '21772.7', '80000.00', '0.00', '', NULL, '80000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (50, '541455547223334', '1383352626', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '21733.3', '20000.00', '0.00', '', NULL, '0', '20000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (51, '357586485159913', '9322643114', '123456', '12345', 'Badda', '', '7.00', '', '', '20000.00', '21695.7', '140000.00', '0.00', '', NULL, '0', '140000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (52, '372622419641121', '8161128561', '123456', '12345', 'Badda', '', '3.00', '', '', '20000.00', '21659.6', '60000.00', '0.00', '', NULL, '60000', '0.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (53, '987798149416841', '1938854338', '123456', '12345', 'Badda', '', '1.00', '', '', '20000.00', '21625', '20000.00', '0.00', '', NULL, '0', '20000.00', 2);
INSERT INTO `invoice_details` (`id`, `invoice_details_id`, `invoice_id`, `product_id`, `sn`, `warehouse`, `description`, `quantity`, `warrenty_date`, `expiry_date`, `rate`, `supplier_rate`, `total_price`, `discount`, `discount_per`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES (54, '313378727416391', '7783187386', '123456', '12345', 'Gulshan', '', '1.00', '', '', '20000.00', '21591.8', '20000.00', '0.00', '', NULL, '40000', '0.00', 2);


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` text NOT NULL,
  `english` text DEFAULT NULL,
  `bangla` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=922 DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (1, 'user_profile', 'User Profile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (2, 'setting', 'Setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (3, 'language', 'Language', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (4, 'manage_users', 'Manage Users', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (5, 'add_user', 'Add User', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (6, 'manage_company', 'Manage Company', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (7, 'web_settings', 'Software Settings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (8, 'manage_accounts', 'Manage Accounts', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (9, 'create_accounts', 'Create Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (10, 'manage_bank', 'Manage Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (11, 'add_new_bank', 'Add New Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (12, 'settings', 'Settings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (13, 'closing_report', 'Closing Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (14, 'closing', 'Closing', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (15, 'cheque_manager', 'Cheque Manager', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (16, 'accounts_summary', 'Accounts Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (17, 'expense', 'Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (18, 'income', 'Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (19, 'accounts', 'Accounts', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (20, 'stock_report', 'Stock Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (21, 'stock', 'Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (22, 'pos_invoice', 'POS Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (23, 'manage_invoice', 'Manage Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (24, 'new_invoice', 'New Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (25, 'invoice', 'Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (26, 'manage_purchase', 'Manage Purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (27, 'add_purchase', 'Add Purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (28, 'purchase', 'Purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (29, 'paid_customer', 'Paid Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (30, 'manage_customer', 'Manage Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (31, 'add_customer', 'Add Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (32, 'customer', 'Organization', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (33, 'supplier_payment_actual', 'Supplier Payment Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (34, 'supplier_sales_summary', 'Supplier Sales Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (35, 'supplier_sales_details', 'Supplier Sales Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (36, 'supplier_ledger', 'Supplier Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (37, 'manage_supplier', 'Manage Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (38, 'add_supplier', 'Add Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (39, 'supplier', 'Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (40, 'product_statement', 'Product Statement', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (41, 'manage_product', 'Manage Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (42, 'add_product', 'Add Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (43, 'product', 'Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (44, 'manage_category', 'Manage Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (45, 'add_category', 'Add Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (46, 'category', 'Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (47, 'sales_report_product_wise', 'Sales Report (Product Wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (48, 'purchase_report', 'Purchase Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (49, 'sales_report', 'Sales Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (50, 'todays_report', 'Todays Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (51, 'report', 'Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (52, 'dashboard', 'Dashboard', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (53, 'online', 'Online', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (54, 'logout', 'Logout', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (55, 'change_password', 'Change Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (56, 'total_purchase', 'Total Purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (57, 'total_amount', 'Total Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (58, 'supplier_name', 'Supplier Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (59, 'invoice_no', 'Invoice No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (60, 'purchase_date', 'Purchase Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (61, 'todays_purchase_report', 'Todays Purchase Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (62, 'total_sales', 'Total Sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (63, 'customer_name', 'Organization Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (64, 'sales_date', 'Sales Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (65, 'todays_sales_report', 'Todays Sales Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (66, 'home', 'Home', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (67, 'todays_sales_and_purchase_report', 'Todays sales and purchase report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (68, 'total_ammount', 'Total Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (69, 'rate', 'Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (70, 'product_model', 'Product Model', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (71, 'product_name', 'Product Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (72, 'search', 'Search', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (73, 'end_date', 'End Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (74, 'start_date', 'Start Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (75, 'total_purchase_report', 'Total Purchase Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (76, 'total_sales_report', 'Total Sales Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (77, 'total_seles', 'Total Sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (78, 'all_stock_report', 'All Stock Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (79, 'search_by_product', 'Search By Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (80, 'date', 'Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (81, 'print', 'Print', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (82, 'stock_date', 'Stock Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (83, 'print_date', 'Print Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (84, 'sales', 'Sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (85, 'price', 'Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (86, 'sl', 'SL.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (87, 'add_new_category', 'Add new category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (88, 'category_name', 'Category Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (89, 'save', 'Save', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (90, 'delete', 'Delete', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (91, 'update', 'Update', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (92, 'action', 'Action', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (93, 'manage_your_category', 'Manage your category ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (94, 'category_edit', 'Category Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (95, 'status', 'Status', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (96, 'active', 'Active', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (97, 'inactive', 'Inactive', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (98, 'save_changes', 'Save Changes', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (99, 'save_and_add_another', 'Save And Add Another', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (100, 'model', 'Model', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (101, 'supplier_price', 'Supplier Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (102, 'sell_price', 'Sale Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (103, 'image', 'Image', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (104, 'select_one', 'Select One', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (105, 'details', 'Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (106, 'new_product', 'New Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (107, 'add_new_product', 'Add new product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (108, 'barcode', 'Barcode', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (109, 'qr_code', 'Qr-Code', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (110, 'product_details', 'Product Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (111, 'manage_your_product', 'Manage your product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (112, 'product_edit', 'Product Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (113, 'edit_your_product', 'Edit your product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (114, 'cancel', 'Cancel', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (115, 'incl_vat', 'Incl. Vat', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (116, 'money', 'TK', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (117, 'grand_total', 'Grand Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (118, 'quantity', 'Qnty', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (119, 'product_report', 'Product Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (120, 'product_sales_and_purchase_report', 'Product sales and purchase report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (121, 'previous_stock', 'Previous Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (122, 'out', 'Out', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (123, 'in', 'In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (124, 'to', 'To', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (125, 'previous_balance', 'Previous Credit Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (126, 'customer_address', 'Organization Address', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (127, 'customer_mobile', 'Organization Mobile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (128, 'customer_email', 'Organization Email', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (129, 'add_new_customer', 'Add new Organization', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (130, 'balance', 'Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (131, 'mobile', 'Mobile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (132, 'address', 'Address', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (133, 'manage_your_customer', 'Manage your Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (134, 'customer_edit', 'Organization Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (135, 'paid_customer_list', 'Paid Organization List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (136, 'ammount', 'Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (137, 'customer_ledger', 'Organization Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (138, 'manage_customer_ledger', 'Manage Organization Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (139, 'customer_information', 'Organization Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (140, 'debit_ammount', 'Debit Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (141, 'credit_ammount', 'Credit Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (142, 'balance_ammount', 'Balance Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (143, 'receipt_no', 'Receipt NO', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (144, 'description', 'Description', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (145, 'debit', 'Debit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (146, 'credit', 'Credit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (147, 'item_information', 'Item Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (148, 'total', 'Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (149, 'please_select_supplier', 'Please Select Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (150, 'submit', 'Submit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (151, 'submit_and_add_another', 'Submit And Add Another One', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (152, 'add_new_item', 'Add New Item', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (153, 'manage_your_purchase', 'Manage your purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (154, 'purchase_edit', 'Purchase Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (155, 'purchase_ledger', 'Purchase Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (156, 'invoice_information', 'Sale Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (157, 'paid_ammount', 'Paid Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (158, 'discount', 'Dis./Pcs.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (159, 'save_and_paid', 'Save And Paid', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (160, 'payee_name', 'Payee Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (161, 'manage_your_invoice', 'Manage your Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (162, 'invoice_edit', 'Sale Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (163, 'new_pos_invoice', 'New POS Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (164, 'add_new_pos_invoice', 'Add new pos Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (165, 'product_id', 'Product ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (166, 'paid_amount', 'Paid Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (167, 'authorised_by', 'Authorised By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (168, 'checked_by', 'Checked By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (169, 'received_by', 'Received By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (170, 'prepared_by', 'Prepared By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (171, 'memo_no', 'Memo No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (172, 'website', 'Website', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (173, 'email', 'Email', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (174, 'invoice_details', 'Sale Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (175, 'reset', 'Reset', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (176, 'payment_account', 'Payment Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (177, 'bank_name', 'Bank Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (178, 'cheque_or_pay_order_no', 'Cheque/Pay Order No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (179, 'payment_type', 'Payment Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (180, 'payment_from', 'Payment From', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (181, 'payment_date', 'Payment Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (182, 'add_income', 'Add Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (183, 'cash', 'Cash', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (184, 'cheque', 'Cheque', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (185, 'pay_order', 'Pay Order', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (186, 'payment_to', 'Payment To', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (187, 'total_outflow_ammount', 'Total Expense Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (188, 'transections', 'Transections', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (189, 'accounts_name', 'Accounts Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (190, 'outflow_report', 'Expense Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (191, 'inflow_report', 'Income Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (192, 'all', 'All', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (193, 'account', 'Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (194, 'from', 'From', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (195, 'account_summary_report', 'Account Summary Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (196, 'search_by_date', 'Search By Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (197, 'cheque_no', 'Cheque No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (198, 'name', 'Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (199, 'closing_account', 'Closing Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (200, 'close_your_account', 'Close your account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (201, 'last_day_closing', 'Last Day Closing', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (202, 'cash_in', 'Cash In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (203, 'cash_out', 'Cash Out', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (204, 'cash_in_hand', 'Cash In Hand', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (205, 'add_new_bank', 'Add New Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (206, 'day_closing', 'Day Closing', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (207, 'account_closing_report', 'Account Closing Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (208, 'last_day_ammount', 'Last Day Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (209, 'adjustment', 'Adjustment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (210, 'pay_type', 'Pay Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (211, 'customer_or_supplier', 'Organization ,Supplier Or Others', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (212, 'transection_id', 'Transections ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (213, 'accounts_summary_report', 'Accounts Summary Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (214, 'bank_list', 'Bank List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (215, 'bank_edit', 'Bank Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (216, 'debit_plus', 'Debit (+)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (217, 'credit_minus', 'Credit (-)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (218, 'account_name', 'Account Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (219, 'account_type', 'Account Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (220, 'account_real_name', 'Account Real Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (221, 'manage_account', 'Manage Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (222, 'company_name', 'Niha International', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (223, 'edit_your_company_information', 'Edit your company information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (224, 'company_edit', 'Company Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (225, 'admin', 'Admin', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (226, 'user', 'User', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (227, 'password', 'Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (228, 'last_name', 'Last Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (229, 'first_name', 'First Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (230, 'add_new_user_information', 'Add new user information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (231, 'user_type', 'User Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (232, 'user_edit', 'User Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (233, 'rtr', 'RTR', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (234, 'ltr', 'LTR', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (235, 'ltr_or_rtr', 'LTR/RTR', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (236, 'footer_text', 'Footer Text', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (237, 'favicon', 'Favicon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (238, 'logo', 'Logo', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (239, 'update_setting', 'Update Setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (240, 'update_your_web_setting', 'Update your web setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (241, 'login', 'Login', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (242, 'your_strong_password', 'Your strong password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (243, 'your_unique_email', 'Your unique email', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (244, 'please_enter_your_login_information', 'Please enter your login information.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (245, 'update_profile', 'Update Profile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (246, 'your_profile', 'Your Profile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (247, 're_type_password', 'Re-Type Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (248, 'new_password', 'New Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (249, 'old_password', 'Old Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (250, 'new_information', 'New Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (251, 'old_information', 'Old Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (252, 'change_your_information', 'Change your information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (253, 'change_your_profile', 'Change your profile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (254, 'profile', 'Profile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (255, 'wrong_username_or_password', 'Wrong User Name Or Password !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (256, 'successfully_updated', 'Successfully Updated.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (257, 'blank_field_does_not_accept', 'Blank Field Does Not Accept !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (258, 'successfully_changed_password', 'Successfully changed password.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (259, 'you_are_not_authorised_person', 'You are not authorised person !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (260, 'password_and_repassword_does_not_match', 'Passwor and re-password does not match !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (261, 'new_password_at_least_six_character', 'New Password At Least 6 Character.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (262, 'you_put_wrong_email_address', 'You put wrong email address !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (263, 'cheque_ammount_asjusted', 'Cheque amount adjusted.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (264, 'successfully_payment_paid', 'Successfully Payment Paid.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (265, 'successfully_added', 'Successfully Added.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (266, 'successfully_updated_2_closing_ammount_not_changeale', 'Successfully Updated -2. Note: Closing Amount Not Changeable.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (267, 'successfully_payment_received', 'Successfully Payment Received.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (268, 'already_inserted', 'Already Inserted !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (269, 'successfully_delete', 'Successfully Delete.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (270, 'successfully_created', 'Successfully Created.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (271, 'logo_not_uploaded', 'Logo not uploaded !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (272, 'favicon_not_uploaded', 'Favicon not uploaded !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (273, 'supplier_mobile', 'Supplier Mobile', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (274, 'supplier_address', 'Supplier Address', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (275, 'supplier_details', 'Supplier Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (276, 'add_new_supplier', 'Add New Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (277, 'manage_suppiler', 'Manage Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (278, 'manage_your_supplier', 'Manage your supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (279, 'manage_supplier_ledger', 'Manage supplier ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (280, 'invoice_id', 'Invoice ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (281, 'deposite_id', 'Deposite ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (282, 'supplier_actual_ledger', 'Supplier Payment Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (283, 'supplier_information', 'Supplier Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (284, 'event', 'Event', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (285, 'add_new_income', 'Add New Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (286, 'add_expese', 'Add Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (287, 'add_new_expense', 'Add New Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (288, 'total_inflow_ammount', 'Total Income Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (289, 'create_new_invoice', 'Create New Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (290, 'create_pos_invoice', 'Create POS Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (291, 'total_profit', 'Total Profit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (292, 'monthly_progress_report', 'Monthly Progress Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (293, 'total_invoice', 'Total Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (294, 'account_summary', 'Account Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (295, 'total_supplier', 'Total Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (296, 'total_product', 'Total Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (297, 'total_customer', 'Total Customer', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (298, 'supplier_edit', 'Supplier Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (299, 'add_new_invoice', 'Add New Sale', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (300, 'add_new_purchase', 'Add new purchase', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (301, 'currency', 'Currency', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (302, 'currency_position', 'Currency Position', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (303, 'left', 'Left', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (304, 'right', 'Right', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (305, 'add_tax', 'Add Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (306, 'manage_tax', 'Manage Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (307, 'add_new_tax', 'Add new tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (308, 'enter_tax', 'Enter Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (309, 'already_exists', 'Already Exists !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (310, 'successfully_inserted', 'Successfully Inserted.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (311, 'tax', 'Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (312, 'tax_edit', 'Tax Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (313, 'product_not_added', 'Product not added !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (314, 'total_tax', 'Total Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (315, 'manage_your_supplier_details', 'Manage your supplier details.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (316, 'invoice_description', 'Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is sim ply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy Lorem Ipsum is simply dummy', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (317, 'thank_you_for_choosing_us', 'Thank you very much for choosing us.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (318, 'billing_date', 'Billing Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (319, 'billing_to', 'Billing To', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (320, 'billing_from', 'Billing From', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (321, 'you_cant_delete_this_product', 'Sorry !!  You can\'t delete this product.This product already used in calculation system!', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (322, 'old_customer', 'Old Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (323, 'new_customer', 'New Customer', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (324, 'new_supplier', 'New Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (325, 'old_supplier', 'Old Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (326, 'credit_customer', 'Credit Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (327, 'account_already_exists', 'This Account Already Exists !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (328, 'edit_income', 'Edit Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (329, 'you_are_not_access_this_part', 'You are not authorised person !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (330, 'account_edit', 'Account Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (331, 'due', 'Due', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (332, 'expense_edit', 'Expense Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (333, 'please_select_customer', 'Please select customer !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (334, 'profit_report', 'Profit Report (Sale Wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (335, 'total_profit_report', 'Total profit report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (336, 'please_enter_valid_captcha', 'Please enter valid captcha.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (337, 'category_not_selected', 'Category not selected.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (338, 'supplier_not_selected', 'Supplier not selected.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (339, 'please_select_product', 'Please select product.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (340, 'product_model_already_exist', 'Product model already exist !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (341, 'invoice_logo', 'Sale Logo', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (342, 'available_qnty', 'Av. Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (343, 'you_can_not_buy_greater_than_available_cartoon', 'You can not select grater than available cartoon !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (344, 'customer_details', 'Organization details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (345, 'manage_customer_details', 'Manage Organization details.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (346, 'site_key', 'Captcha Site Key', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (347, 'secret_key', 'Captcha Secret Key', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (348, 'captcha', 'Captcha', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (349, 'cartoon_quantity', 'Cartoon Quantity', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (350, 'total_cartoon', 'Total Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (351, 'cartoon', 'Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (352, 'item_cartoon', 'Item/Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (353, 'product_and_supplier_did_not_match', 'Product and supplier did not match !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (354, 'if_you_update_purchase_first_select_supplier_then_product_and_then_quantity', 'If you update purchase,first select supplier then product and then update qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (355, 'item', 'Item', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (356, 'manage_your_credit_customer', 'Manage your credit Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (357, 'total_quantity', 'Total Quantity', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (358, 'quantity_per_cartoon', 'Quantity per cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (359, 'barcode_qrcode_scan_here', 'Barcode or QR-code scan here', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (360, 'synchronizer_setting', 'Synchronizer Setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (361, 'data_synchronizer', 'Data Synchronizer', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (362, 'hostname', 'Host name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (363, 'username', 'User Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (364, 'ftp_port', 'FTP Port', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (365, 'ftp_debug', 'FTP Debug', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (366, 'project_root', 'Project Root', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (367, 'please_try_again', 'Please try again', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (368, 'save_successfully', 'Save successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (369, 'synchronize', 'Synchronize', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (370, 'internet_connection', 'Internet Connection', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (371, 'outgoing_file', 'Outgoing File', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (372, 'incoming_file', 'Incoming File', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (373, 'ok', 'Ok', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (374, 'not_available', 'Not Available', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (375, 'available', 'Available', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (376, 'download_data_from_server', 'Download data from server', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (377, 'data_import_to_database', 'Data import to database', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (378, 'data_upload_to_server', 'Data uplod to server', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (379, 'please_wait', 'Please Wait', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (380, 'ooops_something_went_wrong', 'Oooops Something went wrong !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (381, 'upload_successfully', 'Upload successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (382, 'unable_to_upload_file_please_check_configuration', 'Unable to upload file please check configuration', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (383, 'please_configure_synchronizer_settings', 'Please configure synchronizer settings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (384, 'download_successfully', 'Download successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (385, 'unable_to_download_file_please_check_configuration', 'Unable to download file please check configuration', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (386, 'data_import_first', 'Data import past', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (387, 'data_import_successfully', 'Data import successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (388, 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data please check config or sql file', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (389, 'total_sale_ctn', 'Total Sale Ctn', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (390, 'in_qnty', 'In Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (391, 'out_qnty', 'Out Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (392, 'stock_report_supplier_wise', 'Stock Report (Supplier Wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (393, 'all_stock_report_supplier_wise', 'Stock Report (Suppler Wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (394, 'select_supplier', 'Select Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (395, 'stock_report_product_wise', 'Stock Report (Product Wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (396, 'phone', 'Phone', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (397, 'select_product', 'Select Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (398, 'in_quantity', 'In Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (399, 'out_quantity', 'Out Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (400, 'in_taka', 'In TK.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (401, 'out_taka', 'Out TK.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (402, 'commission', 'Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (403, 'generate_commission', 'Generate Commssion', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (404, 'commission_rate', 'Commission Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (405, 'total_ctn', 'Total Ctn.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (406, 'per_pcs_commission', 'Per PCS Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (407, 'total_commission', 'Total Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (408, 'enter', 'Enter', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (409, 'please_add_walking_customer_for_default_customer', 'Please add \'Walking Customer\' for default customer.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (410, 'supplier_ammount', 'Supplier Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (411, 'my_sale_ammount', 'My Sale Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (412, 'signature_pic', 'Signature Picture', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (413, 'branch', 'Branch', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (414, 'ac_no', 'A/C Number', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (415, 'ac_name', 'A/C Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (416, 'bank_transaction', 'Bank Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (417, 'bank', 'Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (418, 'withdraw_deposite_id', 'Withdraw / Deposite ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (419, 'bank_ledger', 'Bank Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (420, 'note_name', 'Note Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (421, 'pcs', 'Pcs.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (422, '1', '1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (423, '2', '2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (424, '5', '5', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (425, '10', '10', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (426, '20', '20', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (427, '50', '50', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (428, '100', '100', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (429, '500', '500', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (430, '1000', '1000', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (431, 'total_discount', 'Total Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (432, 'product_not_found', 'Product not found !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (433, 'this_is_not_credit_customer', 'This is not credit customer !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (434, 'personal_loan', 'Personal Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (435, 'add_person', 'Add Person', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (436, 'add_loan', 'Add Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (437, 'add_payment', 'Add Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (438, 'manage_person', 'Manage Person', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (439, 'personal_edit', 'Person Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (440, 'person_ledger', 'Person Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (441, 'backup_restore', 'Backup ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (442, 'database_backup', 'Database backup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (443, 'file_information', 'File information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (444, 'filename', 'Filename', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (445, 'size', 'Size', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (446, 'backup_date', 'Backup date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (447, 'backup_now', 'Backup now', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (448, 'restore_now', 'Restore now', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (449, 'are_you_sure', 'Are you sure ?', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (450, 'download', 'Download', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (451, 'backup_and_restore', 'Backup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (452, 'backup_successfully', 'Backup successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (453, 'delete_successfully', 'Delete successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (454, 'stock_ctn', 'Stock/Qnt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (455, 'unit', 'Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (456, 'meter_m', 'Meter (M)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (457, 'piece_pc', 'Piece (Pc)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (458, 'kilogram_kg', 'Kilogram (Kg)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (459, 'stock_cartoon', 'Stock Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (460, 'add_product_csv', 'Add Product (CSV)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (461, 'import_product_csv', 'Import product (CSV)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (462, 'close', 'Close', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (463, 'download_example_file', 'Download example file.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (464, 'upload_csv_file', 'Upload CSV File', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (465, 'csv_file_informaion', 'CSV File Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (466, 'out_of_stock', 'Out Of Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (467, 'others', 'Others', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (468, 'full_paid', 'Full Paid', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (469, 'successfully_saved', 'Your Data Successfully Saved', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (470, 'manage_loan', 'Manage Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (471, 'receipt', 'Receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (472, 'payment', 'Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (473, 'cashflow', 'Daily Cash Flow', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (474, 'signature', 'Signature', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (475, 'supplier_reports', 'Supplier Reports', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (476, 'generate', 'Generate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (477, 'todays_overview', 'Todays Overview', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (478, 'last_sales', 'Last Sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (479, 'manage_transaction', 'Manage Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (480, 'daily_summary', 'Daily Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (481, 'daily_cash_flow', 'Daily Cash Flow', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (482, 'custom_report', 'Custom Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (483, 'transaction', 'Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (484, 'receipt_amount', 'Receipt Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (485, 'transaction_details_datewise', 'Transaction Details Datewise', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (486, 'cash_closing', 'Cash Closing', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (487, 'you_can_not_buy_greater_than_available_qnty', 'You can not buy greater than available qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (488, 'supplier_id', 'Supplier ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (489, 'category_id', 'Category ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (490, 'select_report', 'Select Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (491, 'supplier_summary', 'Supplier summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (492, 'sales_payment_actual', 'Sales payment actual', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (493, 'today_already_closed', 'Today already closed.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (494, 'root_account', 'Root Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (495, 'office', 'Office', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (496, 'loan', 'Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (497, 'transaction_mood', 'Transaction Mood', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (498, 'select_account', 'Select Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (499, 'add_receipt', 'Add Receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (500, 'update_transaction', 'Update Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (501, 'no_stock_found', 'No Stock Found !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (502, 'admin_login_area', 'Admin Login Area', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (503, 'print_qr_code', 'Print QR Code', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (504, 'discount_type', 'Discount Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (505, 'discount_percentage', 'Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (506, 'fixed_dis', 'Fixed Dis.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (507, 'return', 'Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (508, 'stock_return_list', 'Stock Return List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (509, 'wastage_return_list', 'Wastage Return List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (510, 'return_invoice', 'Sale Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (511, 'sold_qty', 'Sold Qty', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (512, 'ret_quantity', 'Return Qty', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (513, 'deduction', 'Deduction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (514, 'check_return', 'Check Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (515, 'reason', 'Reason', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (516, 'usablilties', 'Usability', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (517, 'adjs_with_stck', 'Adjust With Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (518, 'return_to_supplier', 'Return To Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (519, 'wastage', 'Wastage', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (520, 'to_deduction', 'Total Deduction ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (521, 'nt_return', 'Net Return Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (522, 'return_list', 'Return List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (523, 'add_return', 'Add Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (524, 'per_qty', 'Purchase Qty', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (525, 'return_supplier', 'Supplier Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (526, 'stock_purchase', 'Stock Purchase Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (527, 'stock_sale', 'Stock Sale Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (528, 'supplier_return', 'Supplier Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (529, 'purchase_id', 'Purchase ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (530, 'return_id', 'Return ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (531, 'supplier_return_list', 'Supplier Return List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (532, 'c_r_slist', 'Stock Return Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (533, 'wastage_list', 'Wastage List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (534, 'please_input_correct_invoice_id', 'Please Input a Correct Sale ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (535, 'please_input_correct_purchase_id', 'Please Input Your Correct  Purchase ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (536, 'add_more', 'Add More', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (537, 'prouct_details', 'Product Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (538, 'prouct_detail', 'Product Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (539, 'stock_return', 'Stock Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (540, 'choose_transaction', 'Select Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (541, 'transection_category', 'Select  Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (542, 'transaction_categry', 'Select Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (543, 'search_supplier', 'Search Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (544, 'customer_id', 'Organization ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (545, 'search_customer', 'Search Customer Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (546, 'serial_no', 'SN', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (547, 'item_discount', 'Item Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (548, 'invoice_discount', 'Sale Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (549, 'add_unit', 'Add Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (550, 'manage_unit', 'Manage Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (551, 'add_new_unit', 'Add New Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (552, 'unit_name', 'Unit Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (553, 'payment_amount', 'Payment Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (554, 'manage_your_unit', 'Manage Your Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (555, 'unit_id', 'Unit ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (556, 'unit_edit', 'Unit Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (557, 'vat', 'Vat', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (558, 'sales_report_category_wise', 'Sales Report (Category wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (559, 'purchase_report_category_wise', 'Purchase Report (Category wise)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (560, 'category_wise_purchase_report', 'Category wise purchase report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (561, 'category_wise_sales_report', 'Category wise sales report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (562, 'best_sale_product', 'Best Sale Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (563, 'all_best_sales_product', 'All Best Sales Products', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (564, 'todays_customer_receipt', 'Todays Customer Receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (565, 'not_found', 'Record not found', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (566, 'collection', 'Collection', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (567, 'increment', 'Increment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (568, 'accounts_tree_view', 'Accounts Tree View', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (569, 'debit_voucher', 'Debit Voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (570, 'voucher_no', 'Voucher No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (571, 'credit_account_head', 'Credit Account Head', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (572, 'remark', 'Remark', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (573, 'code', 'Code', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (574, 'amount', 'Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (575, 'approved', 'Approved', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (576, 'debit_account_head', 'Debit Account Head', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (577, 'credit_voucher', 'Credit Voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (578, 'find', 'Find', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (579, 'transaction_date', 'Transaction Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (580, 'voucher_type', 'Voucher Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (581, 'particulars', 'Particulars', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (582, 'with_details', 'With Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (583, 'general_ledger', 'General Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (584, 'general_ledger_of', 'General ledger of', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (585, 'pre_balance', 'Pre Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (586, 'current_balance', 'Current Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (587, 'to_date', 'To Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (588, 'from_date', 'From Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (589, 'trial_balance', 'Trial Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (590, 'authorized_signature', 'Authorized Signature', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (591, 'chairman', 'Chairman', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (592, 'total_income', 'Total Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (593, 'statement_of_comprehensive_income', 'Statement of Comprehensive Income', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (594, 'profit_loss', 'Profit Loss', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (595, 'cash_flow_report', 'Cash Flow Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (596, 'cash_flow_statement', 'Cash Flow Statement', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (597, 'amount_in_dollar', 'Amount In Dollar', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (598, 'opening_cash_and_equivalent', 'Opening Cash and Equivalent', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (599, 'coa_print', 'Coa Print', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (600, 'cash_flow', 'Cash Flow', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (601, 'cash_book', 'Cash Book', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (602, 'bank_book', 'Bank Book', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (603, 'c_o_a', 'Chart of Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (604, 'journal_voucher', 'Journal Voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (605, 'contra_voucher', 'Contra Voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (606, 'voucher_approval', 'Vouchar Approval', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (607, 'supplier_payment', 'Supplier Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (608, 'customer_receive', 'Organization Receive', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (609, 'gl_head', 'General Head', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (610, 'account_code', 'Account Head', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (611, 'opening_balance', 'Opening Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (612, 'head_of_account', 'Head of Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (613, 'inventory_ledger', 'Inventory Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (614, 'newpassword', 'New Password', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (615, 'password_recovery', 'Password Recovery', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (616, 'forgot_password', 'Forgot Password ??', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (617, 'send', 'Send', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (618, 'due_report', 'Due Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (619, 'due_amount', 'Due Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (620, 'download_sample_file', 'Download Sample File', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (621, 'customer_csv_upload', 'Organization Csv Upload', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (622, 'csv_supplier', 'Csv Upload Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (623, 'csv_upload_supplier', 'Csv Upload Supplier', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (624, 'previous', 'Previous', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (625, 'net_total', 'Net Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (626, 'currency_list', 'Currency List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (627, 'currency_name', 'Currency Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (628, 'currency_icon', 'Currency Symbol', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (629, 'add_currency', 'Add Currency', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (630, 'role_permission', 'Role Permission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (631, 'role_list', 'Role List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (632, 'user_assign_role', 'User Assign Role', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (633, 'permission', 'Permission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (634, 'add_role', 'Add Role', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (635, 'add_module', 'Add Module', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (636, 'module_name', 'Module Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (637, 'office_loan', 'Office Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (638, 'add_menu', 'Add Menu', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (639, 'menu_name', 'Menu Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (640, 'sl_no', 'Sl No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (641, 'create', 'Create', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (642, 'read', 'Read', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (643, 'role_name', 'Role Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (644, 'qty', 'Quantity', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (645, 'max_rate', 'Max Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (646, 'min_rate', 'Min Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (647, 'avg_rate', 'Average Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (648, 'role_permission_added_successfully', 'Role Permission Successfully Added', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (649, 'update_successfully', 'Successfully Updated', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (650, 'role_permission_updated_successfully', 'Role Permission Successfully Updated ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (651, 'shipping_cost', 'Shipping Cost', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (652, 'in_word', 'In Word ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (653, 'shipping_cost_report', 'Shipping Cost Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (654, 'cash_book_report', 'Cash Book Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (655, 'inventory_ledger_report', 'Inventory Ledger Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (656, 'trial_balance_with_opening_as_on', 'Trial Balance With Opening As On', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (657, 'type', 'Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (658, 'taka_only', 'Taka Only', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (659, 'item_description', 'Desc', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (660, 'sold_by', 'Sold By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (661, 'user_wise_sales_report', 'User Wise Sales Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (662, 'user_name', 'User Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (663, 'total_sold', 'Total Sold', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (664, 'user_wise_sale_report', 'User Wise Sales Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (665, 'barcode_or_qrcode', 'Barcode/QR-code', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (666, 'category_csv_upload', 'Category Csv  Upload', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (667, 'unit_csv_upload', 'Unit Csv Upload', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (668, 'invoice_return_list', 'Sales Return list', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (669, 'invoice_return', 'Sales Return', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (670, 'tax_report', 'Tax Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (671, 'select_tax', 'Select Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (672, 'hrm', 'HRM', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (673, 'employee', 'Employee', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (674, 'add_employee', 'Add Employee', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (675, 'manage_employee', 'Manage Employee', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (676, 'attendance', 'Attendance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (677, 'add_attendance', 'Attendance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (678, 'manage_attendance', 'Manage Attendance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (679, 'payroll', 'Payroll', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (680, 'add_payroll', 'Payroll', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (681, 'manage_payroll', 'Manage Payroll', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (682, 'employee_type', 'Employee Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (683, 'employee_designation', 'Employee Designation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (684, 'designation', 'Designation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (685, 'add_designation', 'Add Designation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (686, 'manage_designation', 'Manage Designation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (687, 'designation_update_form', 'Designation Update form', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (688, 'picture', 'Picture', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (689, 'country', 'Country', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (690, 'blood_group', 'Blood Group', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (691, 'address_line_1', 'Address Line 1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (692, 'address_line_2', 'Address Line 2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (693, 'zip', 'Zip code', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (694, 'city', 'City', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (695, 'hour_rate_or_salary', 'Houre Rate/Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (696, 'rate_type', 'Rate Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (697, 'hourly', 'Hourly', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (698, 'salary', 'Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (699, 'employee_update', 'Employee Update', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (700, 'checkin', 'Check In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (701, 'employee_name', 'Employee Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (702, 'checkout', 'Check Out', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (703, 'confirm_clock', 'Confirm Clock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (704, 'stay', 'Stay Time', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (705, 'sign_in', 'Sign In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (706, 'check_in', 'Check In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (707, 'single_checkin', 'Single Check In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (708, 'bulk_checkin', 'Bulk Check In', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (709, 'successfully_checkout', 'Successfully Checkout', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (710, 'attendance_report', 'Attendance Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (711, 'datewise_report', 'Date Wise Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (712, 'employee_wise_report', 'Employee Wise Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (713, 'date_in_time_report', 'Date In Time Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (714, 'request', 'Request', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (715, 'sign_out', 'Sign Out', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (716, 'work_hour', 'Work Hours', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (717, 's_time', 'Start Time', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (718, 'e_time', 'In Time', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (719, 'salary_benefits_type', 'Benefits Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (720, 'salary_benefits', 'Salary Benefits', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (721, 'beneficial_list', 'Benefit List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (722, 'add_beneficial', 'Add Benefits', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (723, 'add_benefits', 'Add Benefits', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (724, 'benefits_list', 'Benefit List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (725, 'benefit_type', 'Benefit Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (726, 'benefits', 'Benefit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (727, 'manage_benefits', 'Manage Benefits', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (728, 'deduct', 'Deduct', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (729, 'add', 'Add', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (730, 'add_salary_setup', 'Add Salary Setup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (731, 'manage_salary_setup', 'Manage Salary Setup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (732, 'basic', 'Basic', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (733, 'salary_type', 'Salary Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (734, 'addition', 'Addition', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (735, 'gross_salary', 'Gross Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (736, 'set', 'Set', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (737, 'salary_generate', 'Salary Generate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (738, 'manage_salary_generate', 'Manage Salary Generate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (739, 'sal_name', 'Salary Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (740, 'gdate', 'Generated Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (741, 'generate_by', 'Generated By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (742, 'the_salary_of', 'The Salary of ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (743, 'already_generated', ' Already Generated', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (744, 'salary_month', 'Salary Month', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (745, 'successfully_generated', 'Successfully Generated', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (746, 'salary_payment', 'Salary Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (747, 'employee_salary_payment', 'Employee Salary Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (748, 'total_salary', 'Total Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (749, 'total_working_minutes', 'Total Working Hours', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (750, 'working_period', 'Working Period', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (751, 'paid_by', 'Paid By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (752, 'pay_now', 'Pay Now ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (753, 'confirm', 'Confirm', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (754, 'successfully_paid', 'Successfully Paid', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (755, 'add_incometax', 'Add Income Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (756, 'setup_tax', 'Setup Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (757, 'start_amount', 'Start Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (758, 'end_amount', 'End Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (759, 'tax_rate', 'Tax Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (760, 'setup', 'Setup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (761, 'manage_income_tax', 'Manage Income Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (762, 'income_tax_updateform', 'Income tax Update form', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (763, 'positional_information', 'Positional Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (764, 'personal_information', 'Personal Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (765, 'timezone', 'Time Zone', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (766, 'sms', 'SMS', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (767, 'sms_configure', 'SMS Configure', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (768, 'url', 'URL', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (769, 'sender_id', 'Sender ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (770, 'api_key', 'Api Key', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (771, 'gui_pos', 'GUI POS', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (772, 'manage_service', 'Manage Service', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (773, 'service', 'Service', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (774, 'add_service', 'Add Service', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (775, 'service_edit', 'Service Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (776, 'service_csv_upload', 'Service CSV Upload', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (777, 'service_name', 'Service Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (778, 'charge', 'Charge', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (779, 'service_invoice', 'Service Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (780, 'service_discount', 'Service Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (781, 'hanging_over', 'ETD', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (782, 'service_details', 'Service Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (783, 'tax_settings', 'Tax Settings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (784, 'default_value', 'Default Value', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (785, 'number_of_tax', 'Number of Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (786, 'please_select_employee', 'Please Select Employee', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (787, 'manage_service_invoice', 'Manage Service Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (788, 'update_service_invoice', 'Update Service Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (789, 'customer_wise_tax_report', 'Organization Wise  Tax Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (790, 'service_id', 'Service Id', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (791, 'invoice_wise_tax_report', 'Invoice Wise Tax Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (792, 'reg_no', 'Reg No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (793, 'update_now', 'Update Now', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (794, 'import', 'Import', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (795, 'add_expense_item', 'Add Expense Item', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (796, 'manage_expense_item', 'Manage Expense Item', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (797, 'add_expense', 'Add Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (798, 'manage_expense', 'Manage Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (799, 'expense_statement', 'Expense Statement', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (800, 'expense_type', 'Expense Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (801, 'expense_item_name', 'Expense Item Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (802, 'stock_purchase_price', 'Stock Purchase Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (803, 'purchase_price', 'Purchase Price', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (804, 'customer_advance', 'Organization Advance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (805, 'advance_type', 'Advance Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (806, 'restore', 'Restore', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (807, 'supplier_advance', 'Supplier Advance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (808, 'please_input_correct_invoice_no', 'Please Input Correct Invoice NO', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (809, 'backup', 'Back Up', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (810, 'app_setting', 'App Settings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (811, 'local_server_url', 'Local Server Url', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (812, 'online_server_url', 'Online Server Url', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (813, 'connet_url', 'Connected Hotspot Ip/url', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (814, 'update_your_app_setting', 'Update Your App Setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (815, 'select_category', 'Select Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (816, 'mini_invoice', 'Mini Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (817, 'purchase_details', 'Purchase Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (818, 'disc', 'Dis %', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (819, 'serial', 'Serial', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (820, 'transaction_head', 'Transaction Head', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (821, 'transaction_type', 'Transaction Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (822, 'return_details', 'Return Details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (823, 'return_to_customer', 'Return To Organization ', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (824, 'sales_and_purchase_report_summary', 'Sales And Purchase Report Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (825, 'add_person_officeloan', 'Add Person (Office Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (826, 'add_loan_officeloan', 'Add Loan (Office Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (827, 'add_payment_officeloan', 'Add Payment (Office Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (828, 'manage_loan_officeloan', 'Manage Loan (Office Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (829, 'add_person_personalloan', 'Add Person (Personal Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (830, 'add_loan_personalloan', 'Add Loan (Personal Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (831, 'add_payment_personalloan', 'Add Payment (Personal Loan)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (832, 'manage_loan_personalloan', 'Manage Loan (Personal)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (833, 'hrm_management', 'Human Resource', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (834, 'cash_adjustment', 'Cash Adjustment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (835, 'adjustment_type', 'Adjustment Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (836, 'change', 'Change', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (837, 'sale_by', 'Sale By', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (838, 'salary_date', 'Salary Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (839, 'earnings', 'Earnings', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (840, 'total_addition', 'Total Addition', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (841, 'total_deduction', 'Total Deduction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (842, 'net_salary', 'Net Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (843, 'ref_number', 'Reference Number', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (844, 'name_of_bank', 'Name Of Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (845, 'salary_slip', 'Salary Slip', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (846, 'basic_salary', 'Basic Salary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (847, 'return_from_customer', 'Return From Organization', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (848, 'quotation', 'Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (849, 'add_quotation', 'Add Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (850, 'manage_quotation', 'Manage Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (851, 'terms', 'Terms', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (852, 'send_to_customer', 'Sent To Customer', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (853, 'quotation_no', 'Quotation No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (854, 'quotation_date', 'Quotation Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (855, 'total_service_tax', 'Total Service Tax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (856, 'totalservicedicount', 'Total Service Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (857, 'item_total', 'Item Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (858, 'service_total', 'Service Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (859, 'quot_description', 'Quotation Description', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (860, 'sub_total', 'Sub Total', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (861, 'mail_setting', 'Mail Setting', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (862, 'mail_configuration', 'Mail Configuration', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (863, 'mail', 'Mail', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (864, 'protocol', 'Protocol', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (865, 'smtp_host', 'SMTP Host', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (866, 'smtp_port', 'SMTP Port', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (867, 'sender_mail', 'Sender Mail', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (868, 'mail_type', 'Mail Type', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (869, 'html', 'HTML', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (870, 'text', 'TEXT', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (871, 'expiry_date', 'Expiry Date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (872, 'api_secret', 'Api Secret', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (873, 'please_config_your_mail_setting', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (874, 'quotation_successfully_added', 'Quotation Successfully Added', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (875, 'add_to_invoice', 'Add To Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (876, 'added_to_invoice', 'Added To Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (877, 'closing_balance', 'Closing Balance', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (878, 'contact', 'Contact', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (879, 'fax', 'Fax', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (880, 'state', 'State', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (881, 'discounts', 'Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (882, 'address1', 'Address1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (883, 'address2', 'Address2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (884, 'receive', 'Receive', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (885, 'purchase_history', 'Purchase History', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (886, 'cash_payment', 'Cash Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (887, 'bank_payment', 'Bank Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (888, 'do_you_want_to_print', 'Do You Want to Print', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (889, 'yes', 'Yes', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (890, 'no', 'No', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (891, 'todays_sale', 'Today\'s Sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (892, 'or', 'OR', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (893, 'no_result_found', 'No Result Found', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (894, 'add_service_quotation', 'Add Service Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (895, 'add_to_invoice', 'Add To Invoice', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (896, 'item_quotation', 'Item Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (897, 'service_quotation', 'Service Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (898, 'return_from', 'Return Form', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (899, 'customer_return_list', 'Organization Return List', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (900, 'pdf', 'Pdf', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (901, 'note', 'Note', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (902, 'update_debit_voucher', 'Update Debit Voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (903, 'update_credit_voucher', 'Update Credit voucher', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (904, 'on', 'On', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (905, '', '', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (906, 'total_expenses', 'Total Expense', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (907, 'already_exist', 'Already Exist', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (908, 'checked_out', 'Checked Out', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (909, 'update_salary_setup', 'Update Salary Setup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (910, 'employee_signature', 'Employee Signature', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (911, 'payslip', 'Payslip', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (912, 'exsisting_role', 'Existing Role', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (913, 'filter', 'Filter', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (914, 'testinput', NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (915, 'update_quotation', 'Update Quotation', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (916, 'quotation_successfully_updated', 'Quotation Successfully Updated', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (917, 'successfully_approved', 'Successfully Approved', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (918, 'expiry', 'Expiry', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (919, 'purchase_report_shelf_wise', 'Warehouse Wise Report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (920, 'sales_cheque_report', 'Manage Cheque', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES (921, 'purchase_cheque_report', 'Manage Cheque', NULL);


#
# TABLE STRUCTURE FOR: module
#

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `directory` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (1, 'invoice', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (2, 'customer', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (3, 'product', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (4, 'supplier', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (5, 'purchase', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (6, 'stock', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (7, 'return', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (8, 'report', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (9, 'accounts', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (10, 'bank', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (11, 'tax', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (12, 'hrm_management', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (13, 'service', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (14, 'commission', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (15, 'setting', NULL, NULL, NULL, 1);
INSERT INTO `module` (`id`, `name`, `description`, `image`, `directory`, `status`) VALUES (16, 'quotation', NULL, NULL, NULL, 1);


#
# TABLE STRUCTURE FOR: money_receipt
#

DROP TABLE IF EXISTS `money_receipt`;

CREATE TABLE `money_receipt` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `VNo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `COAID` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `pay_type` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `cheque_type` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `cheque_date` varchar(255) DEFAULT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (4, 'MR-2', '502040010', NULL, '2021-03-28', 'ADdsdd', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (5, 'MR-3', '502040010', NULL, '2021-03-28', 'Lorem ipsum', '2', 'EBL bank', 'Installment', '1234567', '2021-03-28', NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (6, 'MR-4', '502040010', NULL, '2021-03-28', '34566', '3', NULL, NULL, NULL, NULL, 'Bkash');
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (7, 'MR-5', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (8, 'MR-6', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (9, 'MR-7', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (10, 'MR-8', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (11, 'MR-9', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (12, 'MR-10', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (13, 'MR-11', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (14, 'MR-12', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (15, 'MR-13', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (16, 'MR-14', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (17, 'MR-15', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (18, 'MR-16', '102030000002', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (19, 'MR-17', '502040010', NULL, '2021-03-28', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (20, 'MR-18', '502040010', NULL, '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (21, 'MR-19', '502040010', NULL, '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (22, 'MR-20', '502040010', NULL, '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (23, 'MR-21', '102030000001', NULL, '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (24, 'MR-22', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (25, 'MR-23', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (26, 'MR-24', '502040010', '11', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (27, 'MR-25', '102030000001', '1', '2021-03-29', 'ASD', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (28, 'MR-26', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (29, 'MR-27', '102030000001', '1', '2021-03-29', 'AS', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (30, 'MR-28', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (31, 'MR-29', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (32, 'MR-30', '502040010', '2', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (33, 'MR-31', '102030000001', '1', '2021-03-29', '', '2', 'EBL bank', 'Installment', '123456777', '2021-03-09', NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (34, 'MR-32', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (35, 'MR-33', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (36, 'MR-34', '102030000001', '1', '2021-03-29', '', '3', NULL, NULL, NULL, NULL, 'Bkash');
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (37, 'MR-35', '102030000001', '1', '2021-03-29', 'g', '2', 'EBL bank', '56', '765432456', '2021-03-08', NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (38, 'MR-36', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (39, 'MR-37', '102030000001', '1', '2021-03-29', '', '3', NULL, NULL, NULL, NULL, 'Bkash');
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (40, 'MR-38', '102030000001', '1', '2021-03-29', 'rfd', '3', NULL, NULL, NULL, NULL, 'Bkash');
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (41, 'MR-39', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (42, 'MR-39', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (43, 'MR-40', '102030000001', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (44, 'MR-41', '502040010', '1', '2021-03-29', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (45, 'MR-42', '102030000001', '1', '2021-03-30', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s,', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (46, 'MR-1', '102030000009', '17', '2021-05-07', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (47, 'MR-2', '102030000009', '17', '2021-05-07', '', '2', 'EBL Bank', 'Installment', '5677676543', '2021-05-07', NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (48, 'MR-3', '102030000009', '17', '2021-05-07', '', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `money_receipt` (`id`, `VNo`, `COAID`, `customer_id`, `date`, `remark`, `pay_type`, `bank_name`, `cheque_type`, `cheque_no`, `cheque_date`, `other_name`) VALUES (49, 'MR-4', '102030000009', '17', '2021-05-07', '', '2', 'EBL Bank', 'Inss', '34876543', '2021-05-07', NULL);


#
# TABLE STRUCTURE FOR: payroll_tax_setup
#

DROP TABLE IF EXISTS `payroll_tax_setup`;

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `end_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `rate` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`tax_setup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: person_information
#

DROP TABLE IF EXISTS `person_information`;

CREATE TABLE `person_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `person_information` (`id`, `person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES (1, 'VJF5GQ3T8C', 'Mainul', '0736347', 'Chittagong', 1);


#
# TABLE STRUCTURE FOR: person_ledger
#

DROP TABLE IF EXISTS `person_ledger`;

CREATE TABLE `person_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `debit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid',
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `person_ledger` (`id`, `transaction_id`, `person_id`, `date`, `debit`, `credit`, `details`, `status`) VALUES (1, '55W5QZTLJW', 'VJF5GQ3T8C', '2021-05-06', '2000.00', '0.00', '', 1);


#
# TABLE STRUCTURE FOR: personal_loan
#

DROP TABLE IF EXISTS `personal_loan`;

CREATE TABLE `personal_loan` (
  `per_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `person_id` varchar(30) NOT NULL,
  `debit` decimal(12,2) DEFAULT 0.00,
  `credit` decimal(12,2) NOT NULL DEFAULT 0.00,
  `date` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid',
  PRIMARY KEY (`per_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `personal_loan` (`per_loan_id`, `transaction_id`, `person_id`, `debit`, `credit`, `date`, `details`, `status`) VALUES (1, '8JSWJVXKDO', 'SAWZ6RS5AK', '1000.00', '0.00', '2021-05-06', '', 1);


#
# TABLE STRUCTURE FOR: pesonal_loan_information
#

DROP TABLE IF EXISTS `pesonal_loan_information`;

CREATE TABLE `pesonal_loan_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(30) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `pesonal_loan_information` (`id`, `person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES (1, 'SAWZ6RS5AK', 'Arman', '0182636383', 'Hathazrai,chittgaong', 1);


#
# TABLE STRUCTURE FOR: product_brand
#

DROP TABLE IF EXISTS `product_brand`;

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (16, 'YOTMD1PWYG6YC1T', 'VINNO', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (17, 'K56MPOCRJHDD2ZQ', 'GE-BioMed', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (18, 'S3YKPWFIZPGYHCB', 'Comen', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (19, 'MQ5ZPBM67AUUNDS', 'HAIYE', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (20, 'LODW3REO519FPOC', 'Genoray', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (21, '9CQNE9UJOWVZ6KN', 'KB', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (22, 'JUEUTIH7GVEDIF2', 'CARETIUM', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (23, 'ZFLJGCB2ZQXB9TL', 'Local Purchase', 1);
INSERT INTO `product_brand` (`id`, `brand_id`, `brand_name`, `status`) VALUES (24, '5S2HW4YWTRARWYC', 'Boditech', 1);


#
# TABLE STRUCTURE FOR: product_category
#

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (31, 'VGIJYRWZF4AYB1Y', 'Imaging/Ultrasound', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (32, 'SUX9Y9ZDBPKVJMJ', 'Cardiovascular system', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (33, 'SBGUNTNUZ65JXG5', 'Respiratory', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (34, 'I29MYPVTVMGABGM', 'Microbiology', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (35, 'V5AKOGYV17Q1TUC', 'IVD/Laboratory Product', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (36, 'R95NWQJAYTZXXYP', 'Others Equipments', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (37, 'RF36QPWJD7ONTNG', 'OT Equipment', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (38, 'DU3HETF9P97RVZ9', 'ICU/NICU/CCU Equipment', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (39, 'EGZNN7GPWUWRKR7', 'Urology', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (40, 'V4TIURZMPLMHEER', 'Imaging/CTG', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (41, 'YEX7ZOK7MOS9BZ4', 'ENT Equipment', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (42, '5WJ3JY55HNGABVF', 'Imaging/Radiology', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (43, 'I2HGJY1OWTD8JQY', 'Wheel', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (44, 'AVUGORZ9YN7VORM', 'Machine', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (45, 'YVC8W77TWBHFLJY', 'Electrolyte Reagents', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (46, 'T5Q54G6QYAJSMBM', 'Cell Counter Reagent', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (47, '4UJOPYXNQPLWRL2', 'Strips', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (48, 'SBJENJOAZ53D4WO', 'Tube', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (49, 'T7PQZZYQ6D126TJ', 'Probe', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (50, '9GLSJS6GA4UNI2B', 'I-Chroma Reagent', 1);
INSERT INTO `product_category` (`id`, `category_id`, `category_name`, `status`) VALUES (51, 'W2FJ46B1VC9KQG6', 'Biochemistry Reagent', 1);


#
# TABLE STRUCTURE FOR: product_information
#

DROP TABLE IF EXISTS `product_information`;

CREATE TABLE `product_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `product_id_two` varchar(100) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `brand_id` varchar(255) DEFAULT NULL,
  `ptype_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `re_order_level` int(255) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `tax` float DEFAULT NULL COMMENT 'Tax in %',
  `serial_no` varchar(200) DEFAULT NULL,
  `product_model` varchar(100) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `product_id` (`product_id`),
  KEY `brand_id` (`brand_id`) USING BTREE,
  KEY `ptype_ID` (`ptype_id`),
  KEY `product_id_two` (`product_id_two`)
) ENGINE=MyISAM AUTO_INCREMENT=288 DEFAULT CHARSET=utf8;

INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (1, '123456', NULL, 'VGIJYRWZF4AYB1Y', 'YOTMD1PWYG6YC1T', 'SQROXZJ5T1MQ8LH', 'Mobile', '20000', 0, '', '0', '789', 'Apple', '', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (2, '76857784', NULL, 'VGIJYRWZF4AYB1Y', 'YOTMD1PWYG6YC1T', 'SQROXZJ5T1MQ8LH', 'Laptop', '15000', 0, 'Set', '0', '', '', '', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (3, '16185741', NULL, 'V5AKOGYV17Q1TUC', 'YOTMD1PWYG6YC1T', 'SQROXZJ5T1MQ8LH', 'Charger', '20000', 0, 'Kit', '0', '', 'Lenovo', '', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (4, '8194641933', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO X1', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (5, '5384297979', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO X2', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (6, '9796547961', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO E35', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (7, '8743134669', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO G86', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (8, '3556896232', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO G55', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (9, '7556587957', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO M86', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (10, '1157987336', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO A5', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (11, '4823166214', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'VINNO Q5-2P', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (12, '8631517688', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'GE-75', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (13, '4129568149', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital Trolley type Ultrasound Machine (Color)', '1', 0, 'Unit', '0', NULL, 'GE-55', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (14, '2879635131', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital Portable Ultrasound Machine (Color)', '1', 0, 'Unit', '0', NULL, 'G-55 Power', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (15, '9116169934', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital Portable Ultrasound Machine (Color)', '1', 0, 'Unit', '0', NULL, 'GE-30', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (16, '4384348761', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'GA12A', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (17, '4835518163', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Horizontal Auto Clave', '1', 0, 'Unit', '0', NULL, 'RAU-760', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (18, '8867892527', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Auto ESR Analyzer', '1', 0, 'Unit', '0', NULL, 'ES-20', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (19, '7853112211', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'DC-40', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (20, '9629846392', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital 4D Color Doppler Ultrasound Machine ', '1', 0, 'Unit', '0', NULL, 'DC-30', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (21, '3179993239', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Full Digital Portable Ultrasound Machine (Color)', '1', 0, 'Unit', '0', NULL, 'DP-30', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (22, '6448984473', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Three Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'CM-300', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (23, '1326583713', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Three Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'H3', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (24, '9248637841', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Six Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'CM-600', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (25, '1192373378', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'CM-1200', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (26, '3557531835', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'CM-1200A', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (27, '5463311253', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '1', 0, 'Unit', '0', NULL, 'CM-1200B', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (28, '6174458454', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Anaesthesia Machine with Ventilator ', '1', 0, 'Unit', '0', NULL, 'AX-700', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (29, '1881714245', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Anaesthesia Machine with Ventilator ', '1', 0, 'Unit', '0', NULL, 'AX-400', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (30, '5783737968', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Defibrillator', '1', 0, 'Unit', '0', NULL, 'S8', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (31, '9948395736', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Infant Baby Incubator', '1', 0, 'Unit', '0', NULL, 'B3', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (32, '6839916491', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Six Channel Electrocardiogram (ECG) Machine', '1', 0, 'Unit', '0', NULL, 'EM600', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (33, '9992976661', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Semi Auto Biochemistry Analyzer', '1', 0, 'Unit', '0', NULL, 'EMP-168', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (34, '8282721699', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Fully Auto Biochemistry Analyzer', '1', 0, 'Unit', '0', NULL, 'GA-400', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (35, '5632456713', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Semi Auto Biochemistry & Coagulation Analyzer', '1', 0, 'Unit', '0', NULL, 'G-3000', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (36, '1454799134', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Auto ESR Analyzer', '1', 0, 'Unit', '0', NULL, 'XC-A30', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (37, '7923155884', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Auto ESR Analyzer', '1', 0, 'Unit', '0', NULL, 'XC-A10', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (38, '6416327776', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Electrolyte Analyzer (Three Part)', '1', 0, 'Unit', '0', NULL, 'XI-921F', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (39, '5641423541', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Electrolyte Analyzer with CO2 (Four Part)', '1', 0, 'Unit', '0', NULL, 'XI-921B', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (40, '7297219966', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Blood Glucose Monitoring System', '1', 0, 'Unit', '0', NULL, 'Gmate Voice', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (41, '7467524672', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Blood Glucose Monitoring System', '1', 0, 'Unit', '0', NULL, 'Gmate Origin', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (42, '7989587485', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Anaesthesia Machine ', '1', 0, 'Unit', '0', NULL, 'BD4', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (43, '1441368684', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Fully Automatic Blood Cell Counter (Five Part)', '1', 0, 'Unit', '0', NULL, 'PE-7100', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (44, '8737545392', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Fully Automatic Blood Cell Counter (Three Part)', '1', 0, 'Unit', '0', NULL, 'PE-6800 ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (45, '5139257912', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Fully Automatic Blood Cell Counter (Three Part)', '1', 0, 'Unit', '0', NULL, 'PE-6100', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (46, '1876956835', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Fully Automatic Blood Cell Counter (Three Part)', '1', 0, 'Unit', '0', NULL, 'PE-6000', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (47, '8833549535', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Advance Portable Immuno (Hormone) Analyzer ', '1', 0, 'Unit', '0', NULL, 'I-CHROMA III', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (48, '7597372623', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Advance Portable Immuno (Hormone) Analyzer ', '1', 0, 'Unit', '0', NULL, 'I-CHROMA II ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (49, '6862212785', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Advance Portable Immuno (Hormone) Analyzer ', '1', 0, 'Unit', '0', NULL, 'I-CHROMA I', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (50, '3383818458', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Incubator', '1', 0, 'Unit', '0', NULL, 'I-CHAMBER', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (51, '1235922924', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Holter Electrocardiogram (ECG) Machine', '1', 0, 'Unit', '0', NULL, 'Holter', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (52, '8235793453', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Lab Incubator', '1', 0, 'Unit', '0', NULL, '30 Lit', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (53, '1518119886', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Syringe Pump', '1', 0, 'Unit', '0', NULL, 'M200A', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (54, '5851769878', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Infusion Pump', '1', 0, 'Unit', '0', NULL, 'ME600', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (55, '4367638455', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Microplate Reader', '1', 0, 'Unit', '0', NULL, 'M201', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (56, '3972528298', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Micropipette ', '1', 0, 'Pcs', '0', NULL, '5 to 50', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (57, '4621718787', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Micropipette ', '1', 0, 'Pcs', '0', NULL, '10 to 100', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (58, '8684151135', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Micropipette ', '1', 0, 'Pcs', '0', NULL, '100 to 1000', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (59, '9999226584', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Non-invasive Neonatal Ventilator', '1', 0, 'Unit', '0', NULL, 'NV8', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (60, '5613677763', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Multi Perameter Patient Monitor', '1', 0, 'Unit', '0', NULL, 'STAR-8000', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (61, '4623429536', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Maternal Monitor (CTG Machine) ', '1', 0, 'Unit', '0', NULL, 'STAR-5000F', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (62, '3152364182', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Maternal Monitor (CTG Machine) ', '1', 0, 'Unit', '0', NULL, 'C-21', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (63, '9153611259', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Maternal Monitor (CTG Machine) ', '1', 0, 'Unit', '0', NULL, 'C-22', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (64, '4231951747', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Specialized Neonatal Monitor', '1', 0, 'Unit', '0', NULL, 'C60', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (65, '3746146883', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Multi Perameter Cardiac Monitor', '1', 0, 'Unit', '0', NULL, 'C80', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (66, '3423692267', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Vital Signe Monitor', '1', 0, 'Unit', '0', NULL, 'STAR-80', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (67, '8285285679', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Multi Perameter Patient Monitor', '1', 0, 'Unit', '0', NULL, 'STAR-800', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (68, '1131281664', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Pulse Oximeter', '1', 0, 'Unit', '0', NULL, 'Star-x1', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (69, '4657918118', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Roller Mixer', '1', 0, 'Unit', '0', NULL, 'RM-06', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (70, '5443631793', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Spirometer', '1', 0, 'Unit', '0', NULL, 'MSA99', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (71, '8915867135', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Urine Analyzer', '1', 0, 'Unit', '0', NULL, 'UA-5', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (72, '9441263216', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Auto Cpap System ', '1', 0, 'Unit', '0', NULL, 'E-20A-H-0', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (73, '6325133548', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Bpap System', '1', 0, 'Unit', '0', NULL, 'T-20A', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (74, '3997774678', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Bpap System', '1', 0, 'Unit', '0', NULL, 'T-25T', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (75, '8346822271', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Bpap System', '1', 0, 'Unit', '0', NULL, 'T-25A', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (76, '6999358231', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Auto Cpap ', '1', 0, 'Unit', '0', NULL, 'DS6', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (77, '6215367998', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Bpap System', '1', 0, 'Unit', '0', NULL, 'DS7', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (78, '4656751716', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Bpap System', '1', 0, 'Unit', '0', NULL, 'DS8', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (79, '5123784439', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Surgical Operating Dome Light', '1', 0, 'Unit', '0', NULL, 'MD-DOME-A2', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (80, '3617269838', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Surgical Operating LED Light', '1', 0, 'Unit', '0', NULL, 'MD-LED-A2', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (81, '9461723365', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Ac Compressor Nebulizer ', '1', 0, 'Unit', '0', NULL, 'GE-600E', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (82, '8443599994', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Ac Compressor Nebulizer ', '1', 0, 'Unit', '0', NULL, 'GE-600F', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (83, '6733377216', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Ac Compressor Nebulizer ', '1', 0, 'Unit', '0', NULL, 'GE-600K', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (84, '8953566891', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Ac Compressor Nebulizer ', '1', 0, 'Unit', '0', NULL, 'GE-600H', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (85, '3641417998', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'C-Arm X-Ray Machine', '1', 0, 'Unit', '0', NULL, 'OSCAR Classic', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (86, '9337436433', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Portable X-ray System', '1', 0, 'Unit', '0', NULL, 'PORT-X IV', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (87, '3274796189', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Portable X-ray System', '1', 0, 'Unit', '0', NULL, 'GXI-1 (Size1)', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (88, '1744294715', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Portable X-ray System', '1', 0, 'Unit', '0', NULL, 'GXI-1 (Size2)', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (89, '5416582713', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Dental X-Ray ?OPG Machine', '1', 0, 'Unit', '0', NULL, 'PAPAYA', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (90, '6838279275', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Weight Scale', '1', 0, 'Unit', '0', NULL, 'WS-D ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (91, '9519524674', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Manual  Weight Scale', '1', 0, 'Unit', '0', NULL, 'WS-M ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (92, '5688512335', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital Weight Scale with app option', '1', 0, 'Unit', '0', NULL, 'DWS', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (93, '9635834937', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Test Tube Incubator', '1', 0, 'Unit', '0', NULL, 'TTI-20 ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (94, '8489837141', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Laryngoscope Adult', '1', 0, 'Unit', '0', NULL, 'HYHJ-KC', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (95, '4896144193', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Laryngoscope Neo Natal', '1', 0, 'Unit', '0', NULL, 'HYHJ-KC', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (96, '6398993964', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Laryngoscope Fetal', '1', 0, 'Unit', '0', NULL, 'HYHJ-KC', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (97, '8653295383', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Vein Detector', '1', 0, 'Unit', '0', NULL, 'VD', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (98, '7781816413', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Binocular Microscope', '1', 0, 'Unit', '0', NULL, 'BM50', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (99, '4697882478', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Binocular Microscope', '1', 0, 'Unit', '0', NULL, 'BM80', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (100, '7963479494', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Binocular Microscope with Camera', '1', 0, 'Unit', '0', NULL, 'BM100', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (101, '1781421355', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Binocular Microscope', '1', 0, 'Unit', '0', NULL, 'EM20', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (102, '1351131926', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Binocular Microscope', '1', 0, 'Unit', '0', NULL, 'EM30', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (103, '7662137229', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Centrifuge Machine 6 Whole', '1', 0, 'Unit', '0', NULL, 'EMC-6W', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (104, '6729491722', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Centrifuge Machine 6 Whole', '1', 0, 'Unit', '0', NULL, 'EMC-6W Plus', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (105, '5547234376', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Centrifuge Machine 12 Whole', '1', 0, 'Unit', '0', NULL, 'EMC-12W', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (106, '1678884745', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Centrifuge Machine 24 Whole', '1', 0, 'Unit', '0', NULL, 'C12', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (107, '1593344167', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Digital BP Machine', '1', 0, 'Unit', '0', NULL, 'YE660E', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (108, '7534698948', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Mercury Sphygmomanometer', '1', 0, 'Unit', '0', NULL, 'Yuwell Mercury ', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (109, '5452548431', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Manual BP Machine', '1', 0, 'Unit', '0', NULL, 'MBM', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (110, '7791722461', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Stethoscope', '1', 0, 'Unit', '0', NULL, 'SS10', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (111, '7483252436', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Vital Signe Monitor', '1', 0, 'Unit', '0', NULL, 'NC3', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (112, '1696775945', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Biochemistry Analyzer', '1', 0, 'Unit', '0', NULL, 'EM 88B', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (113, '6169692765', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Biochemistry Analyzer', '1', 0, 'Unit', '0', NULL, 'EM 90', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (114, '3879733953', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Defibrillator', '1', 0, 'Unit', '0', NULL, 'S5', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (115, '6112654952', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'ECG Machine', '1', 0, 'Unit', '0', NULL, 'GE 1200', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (116, '8328148362', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Hematology Analyzer', '1', 0, 'Unit', '0', NULL, 'ACC-555', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (117, '3744585147', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Hemoglobin Meter', '1', 0, 'Unit', '0', NULL, 'Hemochroma', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (118, '4917624756', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Printer', '1', 0, 'Unit', '0', NULL, 'Bixolon', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (119, '1393124937', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'HFNC standard configuration ', '1', 0, 'Unit', '0', NULL, 'NF5', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (120, '3466953829', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Ventilator', '1', 0, 'Unit', '0', NULL, 'V3', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (121, '2352615913', NULL, 'AVUGORZ9YN7VORM', '1QNQTTN3CL9H7ZH', 'SQROXZJ5T1MQ8LH', 'Antithrombotic pressure pump', '1', 0, 'Unit', '0', NULL, 'SCD600', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (122, '8683559377', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Electrolyte Reagent Pack', '1', 0, 'Pack', '0', NULL, 'ABR', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (123, '8726776763', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Electrolyte Reagent Pack', '1', 0, 'Pack', '0', NULL, 'ABW', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (124, '4915422648', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'QC Solution for Electrolyte Analyzer', '1', 0, 'Pack', '0', NULL, '1x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (125, '7156568734', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Electrode for Electrolyte Analyzer', '1', 0, 'Pcs', '0', NULL, 'K', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (126, '8117673258', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Electrode for Electrolyte Analyzer', '1', 0, 'Pcs', '0', NULL, 'Ref', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (127, '3594419797', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Weekly Cleaning Solution for Electrolyte Analyzer', '1', 0, 'Pack', '0', NULL, '1x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (128, '8894325419', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Na Conditioner', '1', 0, 'Pack', '0', NULL, '1x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (129, '1569456693', NULL, 'YVC8W77TWBHFLJY', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Urine Diluent', '1', 0, 'Pack', '0', NULL, '1x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (130, '8659134665', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'LH Lyse (1x200ml)', '1', 0, 'Pack', '0', NULL, 'PE-L05 LH', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (131, '1251938787', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Deff Lyse (1x500ml)', '1', 0, 'Pack', '0', NULL, 'PE-L05 DIFF', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (132, '5772838984', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Concentrate Cleaner (1x100ml)', '1', 0, 'Pack', '0', NULL, 'PE-C02', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (133, '8249934627', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Lyse (1x500ml)', '1', 0, 'Pack', '0', NULL, 'PE-L01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (134, '7352569134', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Strong Cleaner (1x100ml)', '1', 0, 'Pack', '0', NULL, 'PE-C03', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (135, '5184145439', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Diluent (5 Part)', '1', 0, 'Pack', '0', NULL, 'PE-D01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (136, '3857594389', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Diluent (3 Part)', '1', 0, 'Pack', '0', NULL, 'PE-D01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (137, '3864236446', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Diluent (5L)', '1', 0, 'Pack', '0', NULL, 'PE-D01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (138, '4226781552', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Cleaner', '1', 0, 'Pack', '0', NULL, 'PE-C01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (139, '7487318631', NULL, 'T5Q54G6QYAJSMBM', 'JUEUTIH7GVEDIF2', 'OZDDOS2XOMNGQT4', 'Cleaner (2L)', '1', 0, 'Pack', '0', NULL, 'PE-C01', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (140, '7372382784', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Three Channel ECG Paper', '1', 0, 'Unit', '0', NULL, '12C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (141, '3425424751', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Six Channel ECG Paper', '1', 0, 'Unit', '0', NULL, '6C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (142, '2515297517', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Twelve Channel ECG Paper', '1', 0, 'Unit', '0', NULL, '3C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (143, '3456545167', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Ultrasonogram Photo Paper', '1', 0, 'Unit', '0', NULL, '1x20P', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (144, '6297429499', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Analyzer Paper', '1', 0, 'Unit', '0', NULL, 'Bio', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (145, '6856319346', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Hemoglobin Test Strip', '1', 0, 'Kit', '0', NULL, 'Microcuvettes (4x50Test)', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (146, '5763154832', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Urine Test Strip', '1', 0, 'Box', '0', NULL, 'Combo12', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (147, '5752173282', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Urine Test Strip', '1', 0, 'Box', '0', NULL, 'Combo14', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (148, '6617596817', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Gmate Strips', '1', 0, 'Kit', '0', NULL, '1x25T', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (149, '6227553286', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Urine Strip 3 Perameter', '1', 0, 'Unit', '0', NULL, '3 Perameter', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (150, '8668617447', NULL, '4UJOPYXNQPLWRL2', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Urine Strip 6 Perameter', '1', 0, 'Unit', '0', NULL, '6 Perameter', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (151, '5927393775', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'EDTA Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, 'K2 - 2ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (152, '6484247138', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'EDTA Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, 'K2 - 1ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (153, '1233593165', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'ESR Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, '1.6', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (154, '9669366916', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'ESR Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, '1.2', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (155, '3949747538', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Inhibitor for Glucolysis Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, 'Glucose Tube', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (156, '7674541228', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Red Tube No Additive (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, '4ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (157, '5369832539', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Red Tube Clot Activator (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, '4ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (158, '4256799723', NULL, 'SBJENJOAZ53D4WO', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', '3.2% Sodium Citrate Tube (100 pcs Box)', '1', 0, 'Pcs', '0', NULL, 'PT Tube', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (159, '3596838483', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Multi frequency Convex probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'F2-5C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (160, '6731135685', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Phased Array Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'S1-6P', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (161, '5583792327', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Phased Array Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'G1-4P', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (162, '2617144677', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Linear Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'F4-12L', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (163, '5736214316', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Linear Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'X4-12L', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (164, '5641569167', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'TVS Probe (Endocavity probe) (VINNO)', '1', 0, 'Unit', '0', NULL, 'F4-9E', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (165, '9223446573', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Linear Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'X6-16L', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (166, '3414633435', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', '4D Volume Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'D3-6C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (167, '9922492249', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Pediatric Phased Array Probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'G3-10PX', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (168, '3436818978', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Multi frequency Convex probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'X2-6C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (169, '3888542581', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'Multi frequency Convex probe (VINNO)', '1', 0, 'Unit', '0', NULL, 'S1-8C', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (170, '4113291242', NULL, 'T7PQZZYQ6D126TJ', 'ZFLJGCB2ZQXB9TL', 'T52WMQ9BRJ356F4', 'TVS Probe', '1', 0, 'Unit', '0', NULL, 'G4-9E', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (171, '3499334433', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'AFP', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (172, '7341318554', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'AMH', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (173, '3843811497', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Anti-CCP Plus', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (174, '4634155887', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Anti-HBS', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (175, '1559954739', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Anti-HCV', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (176, '6858364938', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'ASO', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (177, '8736732534', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'B-hCG', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (178, '1773518539', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'CEA', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (179, '6597424944', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Cortisol', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (180, '8334297379', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'CRP', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (181, '5677534155', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'CK-MB', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (182, '4485373345', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Cystatin C', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (183, '4536519646', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'D-Dimer', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (184, '2918635995', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Dengue IgG/IgM', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (185, '3275965861', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Dengue NS1', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (186, '6664339371', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Ferritin', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (187, '9998828155', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'FSH', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (188, '5596323913', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'FSH Plus', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (189, '3624959212', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'hCG', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (190, '1959955457', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'hsCRP', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (191, '3715744636', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'HbA1c', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (192, '1942827899', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'HBsAg', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (193, '9656891125', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'HIV Ag/Ab', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (194, '6824489138', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', ' iFOB', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (195, '8651498492', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'LH', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (196, '6426238123', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Microalbumin', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (197, '1674336661', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'NT-pro BNP', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (198, '9321221791', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'PCT', '1', 0, 'Kit', '0', NULL, '10T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (199, '8948617998', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Progesterone', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (200, '8137391546', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'PSA', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (201, '3936713335', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'RF IgM', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (202, '3774161217', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Syphilis', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (203, '8976766543', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'T3', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (204, '1795292271', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'T4', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (205, '5892256987', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Testosterone', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (206, '3272959214', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Tn I', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (207, '3213725222', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Tn I Plus', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (208, '1879722246', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Total IgE', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (209, '4929987137', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'TSH', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (210, '7885855298', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Vitamin D', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (211, '7171255436', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Zika IgG/IgM', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (212, '6857342114', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'H. Pylori SA', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (213, '4287261574', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Influenza A+B', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (214, '8791847418', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Anti-CCP Plus Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (215, '5447634557', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Cardiac Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (216, '6397327735', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Cardiac Calibrator', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (217, '5623556612', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech CRP Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (218, '4762575886', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech D-Dimer Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (219, '3736636859', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech D-Dimer Calibrator', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (220, '9584998659', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech HbA1c Calibrator', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (221, '9622127662', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech HbA1c Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (222, '7441799686', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech HBsAg Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (223, '2141216677', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Hormone Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (224, '2337659117', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'hemochroma PLUS Control set', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (225, '1364335166', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Hormone Calibrator', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (226, '7899993842', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Ferritin Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (227, '2456266691', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Ferritin Calibrator', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (228, '5546495489', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Tn-I Plus Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (229, '1113358753', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Boditech Vitamin D Control', '1', 0, 'Vial', '0', NULL, '1V/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (230, '5869714618', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Anti CCP', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (231, '9569666959', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'IL-6', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (232, '9446377713', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'PRL', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (233, '9918916456', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'PRL Plus', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (234, '5731359711', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'IL-6 Control', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (235, '3541322884', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'Total IgE Control', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (236, '6495363367', NULL, '9GLSJS6GA4UNI2B', '5S2HW4YWTRARWYC', '4MLMIU1DG8ZXI9U', 'NT-ProBNP Detector', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (237, '2692752815', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'ASO 100 Test ', '1', 0, 'Kit', '0', NULL, '1x4.5ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (238, '3777345752', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'ASO 50 Test ', '1', 0, 'Kit', '0', NULL, '1x2.5ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (239, '4171948659', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'RF 100 Test ', '1', 0, 'Kit', '0', NULL, '1x4.5ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (240, '1762348291', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'RF 50 Test ', '1', 0, 'Kit', '0', NULL, '1x2.5ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (241, '8799312542', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Glucose (Greiner)', '1', 0, 'Kit', '0', NULL, '2x500ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (242, '3375437882', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Glucose 1000 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x500ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (243, '1723625578', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'BrucellaAbortus ', '1', 0, 'Kit', '0', NULL, '1 x 5 ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (244, '4357754792', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'BrucellaMelitensis ', '1', 0, 'Kit', '0', NULL, '1 x 5 ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (245, '1575118388', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'TG (Greiner)', '1', 0, 'Kit', '0', NULL, '4x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (246, '8564658871', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'TG 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (247, '6964727495', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Bilirubin (Biotec) ', '1', 0, 'Kit', '0', NULL, '320ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (248, '3426524174', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'CRP 100 Test', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (249, '6589679472', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'CRP 50 Test', '1', 0, 'Kit', '0', NULL, '25T/Box', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (250, '8775938632', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Albumin (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (251, '6359174854', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Albumin 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (252, '4712788199', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Cholesterol (Greiner)', '1', 0, 'Kit', '0', NULL, '4x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (253, '1981223579', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Cholesterol 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (254, '9198282795', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Chloride (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (255, '2681641555', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Creatinine End Point', '1', 0, 'Kit', '0', NULL, '5x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (256, '4258473384', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Creatinine (biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (257, '5874171628', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Anti A ', '1', 0, 'Kit', '0', NULL, '1 x 10ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (258, '6318311453', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Anti B ', '1', 0, 'Kit', '0', NULL, '1 x 10ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (259, '6971576655', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Anti D ', '1', 0, 'Kit', '0', NULL, '1 x 10ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (260, '1632916347', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Anti AB', '1', 0, 'Kit', '0', NULL, '1 x 10ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (261, '3282162161', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'GPT Kinetic UV method (biotec)', '1', 0, 'Kit', '0', NULL, '2x60ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (262, '3669974567', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'GOT Kinetic', '1', 0, 'Kit', '0', NULL, '2x60ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (263, '8865838858', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'GOT End Point', '1', 0, 'Kit', '0', NULL, '2x60ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (264, '5467936471', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Magnesium (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (265, '4259885949', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Amylase (Biotec)', '1', 0, 'Kit', '0', NULL, '5x5ml', 'Csv Uploaded Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (266, '1991287521', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Total Protien (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (267, '8541219475', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Total Protien ', '1', 0, 'Kit', '0', NULL, '1x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (268, '2339981815', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Total Protein 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (269, '4928737289', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Phosphorus (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (270, '6227314334', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Potassium (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (271, '6974944356', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Calcium (Greiner)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (272, '8618298121', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Calcium ', '1', 0, 'Kit', '0', NULL, '1x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (273, '4693498455', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Calcium 100 Test (Biotec) ', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (274, '6145819145', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Hemoglobin (biotec)', '1', 0, 'Kit', '0', NULL, 'Biotec', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (275, '7534242918', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Hemoglobin', '1', 0, 'Kit', '0', NULL, '4x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (276, '6482681373', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'HDLC (Greiner)', '1', 0, 'Kit', '0', NULL, 'Greiner', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (277, '2579737785', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'HDLC ', '1', 0, 'Kit', '0', NULL, '1x100ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (278, '4696114732', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'HDL 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '1x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (279, '9496548243', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Urea 150 Test (Biotec) ', '1', 0, 'Kit', '0', NULL, '3x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (280, '4741534367', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Uric Acid (Greiner)', '1', 0, 'Kit', '0', NULL, '4x25ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (281, '2413512441', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Uric Acid (biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (282, '2278241578', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Uric Acid 100 Test (Biotec)', '1', 0, 'Kit', '0', NULL, '2x50ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (283, '6864781347', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Widal Set', '1', 0, 'Kit', '0', NULL, '4 x 5 ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (284, '5947587624', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Widal (BO)', '1', 0, 'Kit', '0', NULL, '4 x 5 ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (285, '5423271468', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'Widal (AO)', '1', 0, 'Kit', '0', NULL, '4 x 5 ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (286, '7277353965', NULL, 'W2FJ46B1VC9KQG6', '5S2HW4YWTRARWYC', 'OZDDOS2XOMNGQT4', 'RPR', '1', 0, 'Kit', '0', NULL, '1 x 5ml', 'Csv Product', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);
INSERT INTO `product_information` (`id`, `product_id`, `product_id_two`, `category_id`, `brand_id`, `ptype_id`, `product_name`, `price`, `re_order_level`, `unit`, `tax`, `serial_no`, `product_model`, `product_details`, `image`, `status`) VALUES (287, '65592271', NULL, 'VGIJYRWZF4AYB1Y', 'YOTMD1PWYG6YC1T', 'SQROXZJ5T1MQ8LH', 'Bicycle', '600', 0, 'Unit', '0', '', 'Apple', '', 'https://localhost/gmebd/gmebd/my-assets/image/product.png', 1);


#
# TABLE STRUCTURE FOR: product_purchase
#

DROP TABLE IF EXISTS `product_purchase`;

CREATE TABLE `product_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `grand_total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `due_amount` decimal(10,2) DEFAULT 0.00,
  `total_discount` decimal(10,2) DEFAULT NULL,
  `purchase_date` varchar(50) DEFAULT NULL,
  `purchase_details` text DEFAULT NULL,
  `status` int(2) NOT NULL,
  `bank_id` varchar(30) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `cheque_date` varchar(255) DEFAULT NULL,
  `payment_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (13, '20210506175510', '', '30', '1200000.00', '1200000.00', '0.00', '0.00', '2021-05-06', '', 1, '', '', '2021-05-06', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (12, '20210505175757', '', '29', '900000.00', '900000.00', '0.00', '0.00', '2021-05-05', '', 1, '', '', '2021-05-05', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (11, '20210505172049', '', '29', '1800000.00', '1800000.00', '0.00', '0.00', '2021-05-05', '', 1, 'L3FNC8O9AD', '66579', '2021-05-05', 2);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (10, '20210503163159', '', '29', '900000.00', '900000.00', '0.00', '0.00', '2021-05-03', '', 3, NULL, NULL, NULL, 0);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (9, '20210331122936', '12345', '29', '1800000.00', '1800000.00', '0.00', '0.00', '2021-03-31', '', 1, '', '', '2021-03-31', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (14, '20210506180302', '', '31', '2400000.00', '2400000.00', '0.00', '0.00', '2021-05-06', '', 1, '', '', '2021-05-06', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (15, '20210507110815', '', '31', '6000000.00', '6000000.00', '0.00', '0.00', '2021-05-07', '', 1, '', '', '2021-05-07', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (16, '20210507190617', '', '10', '25.00', '25.00', '0.00', '0.00', '2021-05-07', '', 3, NULL, NULL, NULL, 0);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (17, '20210507191452', '', '10', '300.00', '300.00', '0.00', '0.00', '2021-05-07', '', 3, NULL, NULL, NULL, 0);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (18, '20210507192128', '', '10', '146.00', '146.00', '0.00', '0.00', '2021-05-07', '', 1, '', '', '2021-05-07', 1);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (19, '20210507192628', '', '10', '110.00', '110.00', '0.00', '0.00', '2021-05-07', '', 3, NULL, NULL, NULL, 0);
INSERT INTO `product_purchase` (`id`, `purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `paid_amount`, `due_amount`, `total_discount`, `purchase_date`, `purchase_details`, `status`, `bank_id`, `cheque_no`, `cheque_date`, `payment_type`) VALUES (20, '20210509115748', '', '31', '1200000.00', '1200000.00', '0.00', '0.00', '2021-05-09', '', 1, '', '', '2021-05-09', 1);


#
# TABLE STRUCTURE FOR: product_purchase_details
#

DROP TABLE IF EXISTS `product_purchase_details`;

CREATE TABLE `product_purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_detail_id` varchar(100) DEFAULT NULL,
  `purchase_id` bigint(20) DEFAULT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `sn` varchar(1000) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL,
  `lot_number` bigint(255) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `warehouse` varchar(100) NOT NULL,
  `warrenty_date` varchar(50) NOT NULL,
  `expired_date` varchar(50) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (1, 'kM5gfYo799GjrlG', '20210331122936', '123456', '12345', '100.00', '100.00', '456', 'China', 'Badda', '2021-08-30', '', '18000.00', '1800000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (2, '241526713726294', '20210331123719', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '2021-09-02', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (3, 'kM5gfYo799GjrlG', '20210331122936', '123456', NULL, '-10.00', '0.00', '0', '', '', '', '', '18000.00', '-180000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (4, '162755472583925', '20210501092409', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (5, '194328628561336', '20210501092815', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (6, '451937789389396', '20210501100742', '123456', NULL, '-2.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '40000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (7, '242357631727969', '20210501171645', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (8, 'YMpIkq1pFMZtcZ9', '20210503162824', '123456', '', '50.00', '50.00', '0', '', 'Badda', '', '', '18000.00', '900000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (9, '9lEHcDShiG26eOb', '20210503163159', '123456', '', '50.00', '50.00', '0', '', 'CTG', '', '', '18000.00', '900000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (10, '889275125793787', '20210504093921', '123456', NULL, '-2.00', '0.00', '0', '', 'CTG', '', '', '20000.00', '40000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (11, '458625626331185', '20210504120110', '123456', NULL, '-1.00', '0.00', '0', '', 'CTG', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (12, '615289598852291', '20210504120323', '123456', NULL, '-1.00', '0.00', '0', '', 'CTG', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (13, '621527168546482', '20210504122912', '123456', NULL, '-6.00', '0.00', '0', '', 'CTG', '', '', '20000.00', '120000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (14, '727176971721853', '20210504194018', '123456', NULL, '-3.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '60000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (15, '585974866435489', '20210505170745', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (16, 'vsAupaKYXCJdrpU', '20210505172049', '123456', '', '100.00', '100.00', '555', 'BD', 'Gulshan', '', '', '18000.00', '1800000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (17, 'l0nRJTAoYlwURvI', '20210505175757', '123456', '', '50.00', '50.00', '0', '', '', '', '', '18000.00', '900000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (18, '846377944716411', '20210505192803', '123456', NULL, '-10.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '200000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (19, '159583491176934', '20210505193237', '123456', NULL, '-5.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '100000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (20, '616747163562796', '20210505193510', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (21, '727876238739714', '20210505193648', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (22, '631682127113861', '20210505193910', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (23, '766813396668779', '20210505194138', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (24, '118478179361459', '20210505194253', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (25, '854139413579886', '20210505194558', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (26, '544417327254745', '20210505194626', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (27, '345213127991486', '20210506103321', '123456', NULL, '-5.00', '0.00', '0', '', 'CTG', '', '', '50000.00', '250000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (28, '244861373488934', '20210506103344', '123456', NULL, '-5.00', '0.00', '0', '', 'CTG', '', '', '50000.00', '250000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (29, '345512695197327', '20210506103454', '123456', NULL, '-5.00', '0.00', '0', '', 'CTG', '', '', '50000.00', '250000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (30, '858665388617921', '20210506165248', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (31, '182117964798313', '20210506165407', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (32, '491881568137869', '20210506165852', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (33, '855275676447656', '20210506170020', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (34, '141288153288961', '20210506170140', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (35, '927358842846848', '20210506171722', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (36, '479133542677855', '20210506172206', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (37, 'sbvmb1axy3XalVg', '20210506175510', '76857784', '', '100.00', '100.00', '0', '', '', '', '', '12000.00', '1200000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (38, '4cdTgU1TjNod84K', '20210506180302', '16185741', '1111111111', '200.00', '200.00', '555', 'BD', 'Gulshan', '', '', '12000.00', '2400000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (39, '817616996725247', '20210506184308', '16185741', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (40, '362943522658698', '20210506190201', '16185741', NULL, '-4.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '80000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (41, '559466931484958', '20210507104215', '123456', NULL, '-1.00', '0.00', '0', '', 'Gulshan', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (42, 'PWfmBPoT7iQUrwj', '20210507110815', '16185741', '', '500.00', '500.00', '0', 'BD', 'Gulshan', '', '', '12000.00', '6000000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (43, '5mE5LDaJqVozPoc', '20210507190617', '7853112211', '', '5.00', '5.00', '2343', 'BD', 'Dhaka', '', '', '1.00', '5.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (44, '4500w0NszrO4zZ7', '20210507190617', '9629846392', '', '10.00', '10.00', '5678', 'China', 'h', '', '', '1.00', '10.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (45, 'Z6Rg4Dd4xO9PJ1t', '20210507190617', '3179993239', '', '10.00', '10.00', '543356', 'China', '', '', '', '1.00', '10.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (46, 'r093oY92qqeEkE5', '20210507191452', '7853112211', '', '100.00', '100.00', '456', 'China', 'Hathazari', '', '', '1.00', '100.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (47, 'xJtQ1OSQfl6U59a', '20210507191452', '9629846392', '', '100.00', '100.00', '665', 'BD', 'a', '', '', '1.00', '100.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (48, 'ZP6QWpGIiLDzdU', '20210507191452', '3179993239', '', '100.00', '100.00', '677', 'BD', '', '', '', '1.00', '100.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (49, 'ctAEzUm36tV17y2', '20210507192128', '7853112211', '', '56.00', '56.00', '555', 'BD', 'East', '', '', '1.00', '56.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (50, 'bpEsfwWTU32lrVu', '20210507192128', '9629846392', '', '50.00', '50.00', '123', 'BD', 'a', '', '', '1.00', '50.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (51, 'UFVkTGUcAyJu3PV', '20210507192128', '3179993239', '', '40.00', '40.00', '11111', 'BD', '', '', '', '1.00', '40.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (52, 'uc28YAGYuPvkJ5L', '20210507192628', '7853112211', '', '30.00', '30.00', '123', 'BD', 'CTG', '', '', '1.00', '30.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (53, 'E3PFy2sgXTECbxC', '20210507192628', '9629846392', '', '40.00', '40.00', '11111', 'China', 'BADDA', '', '', '1.00', '40.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (54, 'pu38bIuPmZ1yqjR', '20210507192628', '3179993239', '', '40.00', '40.00', '1111', 'China', 'VD', '', '', '1.00', '40.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (55, '123355435757386', '20210508082219', '123456', NULL, '-2.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '40000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (56, '281823515312363', '20210508083123', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (57, '649333416972786', '20210508083320', '123456', NULL, '-3.00', '0.00', '0', '', 'CTG', '', '', '20000.00', '60000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (58, '877695876652816', '20210508085924', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (59, '882413294374958', '20210508085924', '16185741', NULL, '-1.00', '0.00', '0', '', 'a', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (60, '668659528356385', '20210508100005', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (61, '289624613633851', '20210508155029', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (62, 'ebwldOBRpd4Qa6w', '20210509115748', '16185741', '', '100.00', '100.00', '0', '', 'SZ', '', '', '12000.00', '1200000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (63, '538233874683811', '20210509115849', '16185741', NULL, '-2.00', '0.00', '0', '', 'SZ', '', '', '20000.00', '40000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (64, '727198519293857', '20210509120846', '16185741', NULL, '-5.00', '0.00', '0', '', 'SZ', '', '', '20000.00', '100000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (65, '575467577126527', '20210511085352', '123456', NULL, '-5.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '100000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (66, '354111327199317', '20210511085527', '123456', NULL, '-4.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '80000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (67, '282326893942184', '20210511090236', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (68, '936584153178867', '20210511090703', '123456', NULL, '-7.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '140000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (69, '577359863657616', '20210511090947', '123456', NULL, '-3.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '60000.00', '0', 1);
INSERT INTO `product_purchase_details` (`id`, `purchase_detail_id`, `purchase_id`, `product_id`, `sn`, `quantity`, `qty`, `lot_number`, `origin`, `warehouse`, `warrenty_date`, `expired_date`, `rate`, `total_amount`, `discount`, `status`) VALUES (70, '689746134345958', '20210511091145', '123456', NULL, '-1.00', '0.00', '0', '', 'Badda', '', '', '20000.00', '20000.00', '0', 1);


#
# TABLE STRUCTURE FOR: product_return
#

DROP TABLE IF EXISTS `product_return`;

CREATE TABLE `product_return` (
  `return_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `invoice_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `purchase_id` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchase` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date_return` varchar(30) CHARACTER SET latin1 NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `customer_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `deduction` float NOT NULL,
  `total_deduct` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_ret_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `net_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `reason` text CHARACTER SET latin1 NOT NULL,
  `usablity` int(5) NOT NULL,
  KEY `product_id` (`product_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `customer_id` (`customer_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_return` (`return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('546756714458138', '6533569276', '5945696599', NULL, '2021-01-28', '2021-01-28', '2', '1', '1', '', '15.00', '0', '0.00', '0.00', '15.00', '15.00', '', 1);
INSERT INTO `product_return` (`return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('335219345184217', '6533569276', '3888153211', NULL, '2021-01-28', '2021-01-28', '5', '3', '1', '', '200.00', '0', '0.00', '0.00', '600.00', '600.00', '', 1);
INSERT INTO `product_return` (`return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('258119441662175', '6533569276', '3888153211', NULL, '2021-01-28', '2021-01-28', '2', '1', '1', '', '200.00', '0', '0.00', '0.00', '200.00', '200.00', '', 3);
INSERT INTO `product_return` (`return_id`, `product_id`, `invoice_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('172121421687765', '123456', '', '20210331122936', '2021-03-31', '2021-04-21', '100', '10', '', '29', '18000.00', '0', '0.00', '0.00', '180000.00', '180000.00', '', 2);


#
# TABLE STRUCTURE FOR: product_service
#

DROP TABLE IF EXISTS `product_service`;

CREATE TABLE `product_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (3, 'ABC', 'aasd', '1000.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (4, 'Xyz', 'tyu', '1000.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (5, 'Apple', 'GHH', '1.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (6, 'Remote', 'JHShGs', '1000.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (7, 'TTT', 'ds', '2.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (8, 'awe', 'ss', '100.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (9, 'Bottle', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (10, 'Mouse', 's', '1000.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (11, 'Fan', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (12, 'Mobile', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (13, 'Mobile', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (14, 'Laptop', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (15, 'Charger', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (16, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (17, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (18, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (19, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (20, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (21, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (22, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (23, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (24, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (25, 'Full Digital Trolley type Ultrasound Machine (Color)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (26, 'Full Digital Portable Ultrasound Machine (Color)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (27, 'Full Digital Portable Ultrasound Machine (Color)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (28, 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (29, 'Horizontal Auto Clave', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (30, 'Auto ESR Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (31, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (32, 'Full Digital 4D Color Doppler Ultrasound Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (33, 'Full Digital Portable Ultrasound Machine (Color)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (34, 'Digital Three Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (35, 'Digital Three Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (36, 'Digital Six Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (37, 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (38, 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (39, 'Digital Twelve Channel Electrocardiogram (ECG) Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (40, 'Anaesthesia Machine with Ventilator ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (41, 'Anaesthesia Machine with Ventilator ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (42, 'Defibrillator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (43, 'Infant Baby Incubator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (44, 'Digital Six Channel Electrocardiogram (ECG) Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (45, 'Semi Auto Biochemistry Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (46, 'Fully Auto Biochemistry Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (47, 'Semi Auto Biochemistry & Coagulation Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (48, 'Auto ESR Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (49, 'Auto ESR Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (50, 'Electrolyte Analyzer (Three Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (51, 'Electrolyte Analyzer with CO2 (Four Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (52, 'Blood Glucose Monitoring System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (53, 'Blood Glucose Monitoring System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (54, 'Anaesthesia Machine ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (55, 'Fully Automatic Blood Cell Counter (Five Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (56, 'Fully Automatic Blood Cell Counter (Three Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (57, 'Fully Automatic Blood Cell Counter (Three Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (58, 'Fully Automatic Blood Cell Counter (Three Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (59, 'Advance Portable Immuno (Hormone) Analyzer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (60, 'Advance Portable Immuno (Hormone) Analyzer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (61, 'Advance Portable Immuno (Hormone) Analyzer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (62, 'Incubator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (63, 'Holter Electrocardiogram (ECG) Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (64, 'Lab Incubator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (65, 'Syringe Pump', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (66, 'Infusion Pump', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (67, 'Microplate Reader', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (68, 'Micropipette ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (69, 'Micropipette ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (70, 'Micropipette ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (71, 'Non-invasive Neonatal Ventilator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (72, 'Multi Perameter Patient Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (73, 'Maternal Monitor (CTG Machine) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (74, 'Maternal Monitor (CTG Machine) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (75, 'Maternal Monitor (CTG Machine) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (76, 'Specialized Neonatal Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (77, 'Multi Perameter Cardiac Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (78, 'Vital Signe Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (79, 'Multi Perameter Patient Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (80, 'Pulse Oximeter', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (81, 'Roller Mixer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (82, 'Spirometer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (83, 'Urine Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (84, 'Auto Cpap System ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (85, 'Bpap System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (86, 'Bpap System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (87, 'Bpap System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (88, 'Auto Cpap ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (89, 'Bpap System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (90, 'Bpap System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (91, 'Surgical Operating Dome Light', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (92, 'Surgical Operating LED Light', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (93, 'Ac Compressor Nebulizer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (94, 'Ac Compressor Nebulizer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (95, 'Ac Compressor Nebulizer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (96, 'Ac Compressor Nebulizer ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (97, 'C-Arm X-Ray Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (98, 'Portable X-ray System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (99, 'Portable X-ray System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (100, 'Portable X-ray System', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (101, 'Digital Dental X-Ray ?OPG Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (102, 'Digital Weight Scale', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (103, 'Manual  Weight Scale', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (104, 'Digital Weight Scale with app option', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (105, 'Test Tube Incubator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (106, 'Laryngoscope Adult', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (107, 'Laryngoscope Neo Natal', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (108, 'Laryngoscope Fetal', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (109, 'Vein Detector', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (110, 'Binocular Microscope', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (111, 'Binocular Microscope', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (112, 'Binocular Microscope with Camera', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (113, 'Binocular Microscope', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (114, 'Binocular Microscope', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (115, 'Centrifuge Machine 6 Whole', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (116, 'Centrifuge Machine 6 Whole', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (117, 'Centrifuge Machine 12 Whole', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (118, 'Centrifuge Machine 24 Whole', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (119, 'Digital BP Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (120, 'Mercury Sphygmomanometer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (121, 'Manual BP Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (122, 'Stethoscope', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (123, 'Vital Signe Monitor', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (124, 'Biochemistry Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (125, 'Biochemistry Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (126, 'Defibrillator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (127, 'ECG Machine', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (128, 'Hematology Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (129, 'Hemoglobin Meter', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (130, 'Printer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (131, 'HFNC standard configuration ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (132, 'Ventilator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (133, 'Antithrombotic pressure pump', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (134, 'Electrolyte Reagent Pack', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (135, 'Electrolyte Reagent Pack', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (136, 'QC Solution for Electrolyte Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (137, 'Electrode for Electrolyte Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (138, 'Electrode for Electrolyte Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (139, 'Weekly Cleaning Solution for Electrolyte Analyzer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (140, 'Na Conditioner', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (141, 'Urine Diluent', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (142, 'LH Lyse (1x200ml)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (143, 'Deff Lyse (1x500ml)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (144, 'Concentrate Cleaner (1x100ml)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (145, 'Lyse (1x500ml)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (146, 'Strong Cleaner (1x100ml)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (147, 'Diluent (5 Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (148, 'Diluent (3 Part)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (149, 'Diluent (5L)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (150, 'Cleaner', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (151, 'Cleaner (2L)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (152, 'Three Channel ECG Paper', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (153, 'Six Channel ECG Paper', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (154, 'Twelve Channel ECG Paper', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (155, 'Ultrasonogram Photo Paper', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (156, 'Analyzer Paper', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (157, 'Hemoglobin Test Strip', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (158, 'Urine Test Strip', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (159, 'Urine Test Strip', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (160, 'Gmate Strips', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (161, 'Urine Strip 3 Perameter', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (162, 'Urine Strip 6 Perameter', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (163, 'EDTA Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (164, 'EDTA Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (165, 'ESR Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (166, 'ESR Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (167, 'Inhibitor for Glucolysis Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (168, 'Red Tube No Additive (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (169, 'Red Tube Clot Activator (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (170, '3.2% Sodium Citrate Tube (100 pcs Box)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (171, 'Multi frequency Convex probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (172, 'Phased Array Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (173, 'Phased Array Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (174, 'Linear Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (175, 'Linear Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (176, 'TVS Probe (Endocavity probe) (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (177, 'Linear Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (178, '4D Volume Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (179, 'Pediatric Phased Array Probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (180, 'Multi frequency Convex probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (181, 'Multi frequency Convex probe (VINNO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (182, 'TVS Probe', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (183, 'AFP', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (184, 'AMH', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (185, 'Anti-CCP Plus', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (186, 'Anti-HBS', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (187, 'Anti-HCV', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (188, 'ASO', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (189, 'B-hCG', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (190, 'CEA', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (191, 'Cortisol', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (192, 'CRP', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (193, 'CK-MB', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (194, 'Cystatin C', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (195, 'D-Dimer', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (196, 'Dengue IgG/IgM', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (197, 'Dengue NS1', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (198, 'Ferritin', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (199, 'FSH', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (200, 'FSH Plus', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (201, 'hCG', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (202, 'hsCRP', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (203, 'HbA1c', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (204, 'HBsAg', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (205, 'HIV Ag/Ab', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (206, ' iFOB', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (207, 'LH', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (208, 'Microalbumin', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (209, 'NT-pro BNP', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (210, 'PCT', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (211, 'Progesterone', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (212, 'PSA', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (213, 'RF IgM', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (214, 'Syphilis', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (215, 'T3', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (216, 'T4', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (217, 'Testosterone', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (218, 'Tn I', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (219, 'Tn I Plus', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (220, 'Total IgE', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (221, 'TSH', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (222, 'Vitamin D', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (223, 'Zika IgG/IgM', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (224, 'H. Pylori SA', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (225, 'Influenza A+B', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (226, 'Boditech Anti-CCP Plus Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (227, 'Boditech Cardiac Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (228, 'Boditech Cardiac Calibrator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (229, 'Boditech CRP Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (230, 'Boditech D-Dimer Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (231, 'Boditech D-Dimer Calibrator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (232, 'Boditech HbA1c Calibrator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (233, 'Boditech HbA1c Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (234, 'Boditech HBsAg Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (235, 'Boditech Hormone Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (236, 'hemochroma PLUS Control set', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (237, 'Boditech Hormone Calibrator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (238, 'Boditech Ferritin Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (239, 'Boditech Ferritin Calibrator', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (240, 'Boditech Tn-I Plus Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (241, 'Boditech Vitamin D Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (242, 'Anti CCP', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (243, 'IL-6', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (244, 'PRL', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (245, 'PRL Plus', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (246, 'IL-6 Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (247, 'Total IgE Control', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (248, 'NT-ProBNP Detector', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (249, 'ASO 100 Test ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (250, 'ASO 50 Test ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (251, 'RF 100 Test ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (252, 'RF 50 Test ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (253, 'Glucose (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (254, 'Glucose 1000 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (255, 'BrucellaAbortus ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (256, 'BrucellaMelitensis ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (257, 'TG (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (258, 'TG 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (259, 'Bilirubin (Biotec) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (260, 'CRP 100 Test', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (261, 'CRP 50 Test', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (262, 'Albumin (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (263, 'Albumin 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (264, 'Cholesterol (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (265, 'Cholesterol 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (266, 'Chloride (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (267, 'Creatinine End Point', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (268, 'Creatinine (biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (269, 'Anti A ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (270, 'Anti B ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (271, 'Anti D ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (272, 'Anti AB', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (273, 'GPT Kinetic UV method (biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (274, 'GOT Kinetic', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (275, 'GOT End Point', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (276, 'Magnesium (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (277, 'Amylase (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (278, 'Amylase (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (279, 'Total Protien (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (280, 'Total Protien ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (281, 'Total Protein 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (282, 'Phosphorus (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (283, 'Potassium (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (284, 'Calcium (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (285, 'Calcium ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (286, 'Calcium 100 Test (Biotec) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (287, 'Hemoglobin (biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (288, 'Hemoglobin', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (289, 'HDLC (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (290, 'HDLC ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (291, 'HDL 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (292, 'Urea 150 Test (Biotec) ', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (293, 'Uric Acid (Greiner)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (294, 'Uric Acid (biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (295, 'Uric Acid 100 Test (Biotec)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (296, 'Widal Set', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (297, 'Widal (BO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (298, 'Widal (AO)', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (299, 'RPR', '', '0.00');
INSERT INTO `product_service` (`service_id`, `service_name`, `description`, `charge`) VALUES (300, 'Bicycle', '', '0.00');


#
# TABLE STRUCTURE FOR: product_type
#

DROP TABLE IF EXISTS `product_type`;

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptype_id` varchar(255) NOT NULL,
  `ptype_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (25, 'SQROXZJ5T1MQ8LH', '4D Color Doppler', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (26, 'KDFEXMCOAQBA9U4', 'Electrocardiogram (ECG) ', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (27, '2ZRQ5WUW3ICFQGY', 'ICU/NICU/CCU Equipment', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (28, 'RURBN2D2P2SDZSQ', 'IVD/Laboratory Product', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (29, '1GOQNI3RHAZTO1B', 'Others Equipments', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (30, 'DUAEZKW1FZEJ1FE', 'Surgary', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (31, 'WZ3L71OEYJX9FSG', 'Imaging/CTG', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (32, '81U9XJO9IUPTMB1', 'ENT Equipment', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (33, 'HQ3BIJNO3DYRTR8', 'OT Equipment', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (34, 'BSLYU7FP4ZDV7MG', 'Car Wheel', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (35, 'OZDDOS2XOMNGQT4', 'Reagent', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (36, 'T52WMQ9BRJ356F4', 'Accessories', 1);
INSERT INTO `product_type` (`id`, `ptype_id`, `ptype_name`, `status`) VALUES (37, '4MLMIU1DG8ZXI9U', 'POCT', 1);


#
# TABLE STRUCTURE FOR: quot_products_used
#

DROP TABLE IF EXISTS `quot_products_used`;

CREATE TABLE `quot_products_used` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quot_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `serial_no` varchar(30) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `used_qty` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_per` varchar(15) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `quot_id` (`quot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: quotation
#

DROP TABLE IF EXISTS `quotation`;

CREATE TABLE `quotation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `quotation_id` varchar(30) NOT NULL,
  `quot_description` text NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `quotdate` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `item_total_amount` decimal(12,2) NOT NULL,
  `item_total_dicount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `item_total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `service_total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_dis_item` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_dis_service` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quot_no` varchar(50) NOT NULL,
  `create_by` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `cust_show` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `quot_no` (`quot_no`),
  KEY `quotation_id` (`quotation_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: quotation_service_used
#

DROP TABLE IF EXISTS `quotation_service_used`;

CREATE TABLE `quotation_service_used` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quot_id` varchar(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `quot_id` (`quot_id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: quotation_taxinfo
#

DROP TABLE IF EXISTS `quotation_taxinfo`;

CREATE TABLE `quotation_taxinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `quotation_taxinfo` (`id`, `date`, `customer_id`, `relation_id`) VALUES (1, '2020-09-05', 1, 'item1000');
INSERT INTO `quotation_taxinfo` (`id`, `date`, `customer_id`, `relation_id`) VALUES (2, '2020-09-05', 1, 'serv1000');


#
# TABLE STRUCTURE FOR: role_permission
#

DROP TABLE IF EXISTS `role_permission`;

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_module_id` (`fk_module_id`),
  KEY `fk_user_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4167 DEFAULT CHARSET=utf8;

INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2190, 1, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2191, 2, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2192, 3, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2193, 114, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2194, 25, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2195, 26, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2196, 27, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2197, 28, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2198, 111, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2199, 113, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2200, 21, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2201, 22, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2202, 23, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2203, 24, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2204, 30, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2205, 31, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2206, 32, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2207, 33, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2208, 112, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2209, 35, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2210, 36, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2211, 43, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2212, 37, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2213, 38, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2214, 39, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2215, 40, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2216, 46, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2217, 47, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2218, 48, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2219, 49, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2220, 50, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2221, 51, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2222, 52, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2223, 53, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2224, 54, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2225, 55, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2226, 97, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2227, 98, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2228, 99, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2229, 100, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2230, 101, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2231, 102, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2232, 122, 1, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2233, 4, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2234, 5, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2235, 6, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2236, 7, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2237, 8, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2238, 9, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2239, 10, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2240, 11, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2241, 12, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2242, 13, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2243, 14, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2244, 15, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2245, 16, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2246, 17, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2247, 18, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2248, 19, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2249, 56, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2250, 57, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2251, 58, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2252, 41, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2253, 103, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2254, 104, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2255, 109, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2256, 110, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2257, 60, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2258, 61, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2259, 62, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2260, 63, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2261, 64, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2262, 65, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2263, 66, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2264, 67, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2265, 68, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2266, 69, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2267, 70, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2268, 71, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2269, 72, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2270, 73, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2271, 74, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2272, 75, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2273, 76, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2274, 77, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2275, 78, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2276, 79, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2277, 80, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2278, 81, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2279, 82, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2280, 83, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2281, 84, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2282, 85, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2283, 86, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2284, 105, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2285, 106, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2286, 107, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2287, 108, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2288, 59, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2289, 87, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2290, 88, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2291, 89, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2292, 90, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2293, 91, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2294, 92, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2295, 93, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2296, 94, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2297, 95, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2298, 96, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2299, 115, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2300, 116, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2301, 117, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2302, 118, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2303, 119, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2304, 120, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (2305, 121, 1, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3582, 1, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3583, 2, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3584, 3, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3585, 114, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3586, 25, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3587, 26, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3588, 27, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3589, 28, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3590, 111, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3591, 113, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3592, 21, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3593, 22, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3594, 23, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3595, 24, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3596, 30, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3597, 31, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3598, 32, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3599, 33, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3600, 112, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3601, 35, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3602, 36, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3603, 43, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3604, 37, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3605, 38, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3606, 39, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3607, 40, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3608, 46, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3609, 47, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3610, 48, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3611, 49, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3612, 50, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3613, 51, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3614, 52, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3615, 53, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3616, 54, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3617, 55, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3618, 97, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3619, 98, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3620, 99, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3621, 100, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3622, 101, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3623, 102, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3624, 122, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3625, 4, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3626, 5, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3627, 6, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3628, 7, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3629, 8, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3630, 9, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3631, 10, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3632, 11, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3633, 12, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3634, 13, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3635, 14, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3636, 15, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3637, 16, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3638, 17, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3639, 18, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3640, 19, 5, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3641, 56, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3642, 57, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3643, 58, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3644, 41, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3645, 103, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3646, 104, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3647, 109, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3648, 110, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3649, 60, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3650, 61, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3651, 62, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3652, 63, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3653, 64, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3654, 65, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3655, 66, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3656, 67, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3657, 68, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3658, 69, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3659, 70, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3660, 71, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3661, 72, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3662, 73, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3663, 74, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3664, 75, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3665, 76, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3666, 77, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3667, 78, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3668, 79, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3669, 80, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3670, 81, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3671, 82, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3672, 83, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3673, 84, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3674, 85, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3675, 86, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3676, 105, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3677, 106, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3678, 107, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3679, 108, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3680, 59, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3681, 87, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3682, 88, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3683, 89, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3684, 90, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3685, 91, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3686, 92, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3687, 93, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3688, 94, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3689, 95, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3690, 96, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3691, 115, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3692, 116, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3693, 117, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3694, 118, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3695, 119, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3696, 120, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3697, 121, 5, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3698, 1, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3699, 2, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3700, 3, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3701, 114, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3702, 123, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3703, 25, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3704, 26, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3705, 27, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3706, 28, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3707, 111, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3708, 113, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3709, 21, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3710, 22, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3711, 23, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3712, 24, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3713, 30, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3714, 31, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3715, 32, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3716, 33, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3717, 112, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3718, 35, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3719, 36, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3720, 43, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3721, 37, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3722, 38, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3723, 39, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3724, 40, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3725, 46, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3726, 47, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3727, 48, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3728, 49, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3729, 50, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3730, 51, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3731, 52, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3732, 53, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3733, 54, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3734, 55, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3735, 97, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3736, 98, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3737, 99, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3738, 100, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3739, 101, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3740, 102, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3741, 122, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3742, 4, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3743, 5, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3744, 6, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3745, 7, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3746, 8, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3747, 9, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3748, 10, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3749, 11, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3750, 12, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3751, 13, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3752, 14, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3753, 15, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3754, 16, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3755, 17, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3756, 18, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3757, 19, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3758, 56, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3759, 57, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3760, 58, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3761, 41, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3762, 103, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3763, 104, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3764, 109, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3765, 110, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3766, 60, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3767, 61, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3768, 62, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3769, 63, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3770, 64, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3771, 65, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3772, 66, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3773, 67, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3774, 68, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3775, 69, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3776, 70, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3777, 71, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3778, 72, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3779, 73, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3780, 74, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3781, 75, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3782, 76, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3783, 77, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3784, 78, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3785, 79, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3786, 80, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3787, 81, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3788, 82, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3789, 83, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3790, 84, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3791, 85, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3792, 86, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3793, 105, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3794, 106, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3795, 107, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3796, 108, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3797, 59, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3798, 87, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3799, 88, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3800, 89, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3801, 90, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3802, 91, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3803, 92, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3804, 93, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3805, 94, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3806, 95, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3807, 96, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3808, 115, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3809, 116, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3810, 117, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3811, 118, 2, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3812, 119, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3813, 120, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (3814, 121, 2, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4049, 1, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4050, 2, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4051, 3, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4052, 114, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4053, 123, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4054, 25, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4055, 26, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4056, 27, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4057, 28, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4058, 111, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4059, 113, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4060, 21, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4061, 22, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4062, 23, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4063, 24, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4064, 30, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4065, 31, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4066, 32, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4067, 33, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4068, 112, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4069, 35, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4070, 36, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4071, 124, 6, 1, 1, 1, 1);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4072, 43, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4073, 37, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4074, 38, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4075, 39, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4076, 40, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4077, 46, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4078, 47, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4079, 48, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4080, 49, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4081, 50, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4082, 51, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4083, 52, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4084, 53, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4085, 54, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4086, 55, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4087, 97, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4088, 98, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4089, 99, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4090, 100, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4091, 101, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4092, 102, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4093, 122, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4094, 4, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4095, 5, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4096, 6, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4097, 7, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4098, 8, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4099, 9, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4100, 10, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4101, 11, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4102, 12, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4103, 13, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4104, 14, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4105, 15, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4106, 16, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4107, 17, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4108, 18, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4109, 19, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4110, 56, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4111, 57, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4112, 58, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4113, 41, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4114, 103, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4115, 104, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4116, 109, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4117, 110, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4118, 60, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4119, 61, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4120, 62, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4121, 63, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4122, 64, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4123, 65, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4124, 66, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4125, 67, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4126, 68, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4127, 69, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4128, 70, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4129, 71, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4130, 72, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4131, 73, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4132, 74, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4133, 75, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4134, 76, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4135, 77, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4136, 78, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4137, 79, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4138, 80, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4139, 81, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4140, 82, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4141, 83, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4142, 84, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4143, 85, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4144, 86, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4145, 105, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4146, 106, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4147, 107, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4148, 108, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4149, 59, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4150, 87, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4151, 88, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4152, 89, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4153, 90, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4154, 91, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4155, 92, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4156, 93, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4157, 94, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4158, 95, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4159, 96, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4160, 115, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4161, 116, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4162, 117, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4163, 118, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4164, 119, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4165, 120, 6, 0, 0, 0, 0);
INSERT INTO `role_permission` (`id`, `fk_module_id`, `role_id`, `create`, `read`, `update`, `delete`) VALUES (4166, 121, 6, 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: salary_sheet_generate
#

DROP TABLE IF EXISTS `salary_sheet_generate`;

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `gdate` varchar(30) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ssg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `salary_sheet_generate` (`ssg_id`, `name`, `gdate`, `start_date`, `end_date`, `generate_by`) VALUES (5, '', 'January 2021', '2021-1-1', '2021-1-31', 'Global Medical');


#
# TABLE STRUCTURE FOR: salary_type
#

DROP TABLE IF EXISTS `salary_type`;

CREATE TABLE `salary_type` (
  `salary_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `sal_name` varchar(100) NOT NULL,
  `salary_type` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`salary_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `salary_type`, `status`) VALUES (4, 'House Rent', '1', '1');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `salary_type`, `status`) VALUES (5, 'Medical Allowance', '1', '1');
INSERT INTO `salary_type` (`salary_type_id`, `sal_name`, `salary_type`, `status`) VALUES (6, 'Transport Allowance', '1', '1');


#
# TABLE STRUCTURE FOR: sec_role
#

DROP TABLE IF EXISTS `sec_role`;

CREATE TABLE `sec_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `sec_role` (`id`, `type`) VALUES (1, 'Super Admin');
INSERT INTO `sec_role` (`id`, `type`) VALUES (2, 'Gmebd');
INSERT INTO `sec_role` (`id`, `type`) VALUES (5, 'sales');
INSERT INTO `sec_role` (`id`, `type`) VALUES (6, 'test');


#
# TABLE STRUCTURE FOR: sec_userrole
#

DROP TABLE IF EXISTS `sec_userrole`;

CREATE TABLE `sec_userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roleid` int(11) NOT NULL,
  `createby` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  UNIQUE KEY `ID` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (1, '2', 1, '2', '2020-10-30 08:52:32');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (2, '2', 2, '2', '2020-10-30 12:33:52');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (3, '2', 2, 'OpSoxJvBbbS8Rws', '2020-10-30 12:38:49');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (4, 'tF2YChLBH86gHfG', 2, 'OpSoxJvBbbS8Rws', '2020-10-30 12:41:34');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (5, 'lhnKdCdtVDMGqNr', 2, 'OpSoxJvBbbS8Rws', '2021-01-24 07:00:46');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (6, 'lhnKdCdtVDMGqNr', 4, 'OpSoxJvBbbS8Rws', '2021-01-24 07:08:02');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (7, 'ijpPELEg1KWywCs', 4, 'OpSoxJvBbbS8Rws', '2021-01-24 07:09:51');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (8, 'ijpPELEg1KWywCs', 5, 'tF2YChLBH86gHfG', '2021-01-24 07:15:29');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (9, 'tF2YChLBH86gHfG', 2, 'OpSoxJvBbbS8Rws', '2021-01-26 05:39:28');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (10, 'tF2YChLBH86gHfG', 2, 'OpSoxJvBbbS8Rws', '2021-01-28 04:15:05');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (11, 'ijpPELEg1KWywCs', 6, 'OpSoxJvBbbS8Rws', '2021-02-09 07:25:58');
INSERT INTO `sec_userrole` (`id`, `user_id`, `roleid`, `createby`, `createdate`) VALUES (12, 'V2DEJbIBFZq40dl', 6, 'OpSoxJvBbbS8Rws', '2021-02-09 07:27:25');


#
# TABLE STRUCTURE FOR: sent_sms
#

DROP TABLE IF EXISTS `sent_sms`;

CREATE TABLE `sent_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `sent_sms` (`id`, `from`, `to`, `message`) VALUES (1, '8809601000500', '01787281564', 'Sarwar Tester ...');


#
# TABLE STRUCTURE FOR: service_invoice
#

DROP TABLE IF EXISTS `service_invoice`;

CREATE TABLE `service_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucher_no` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `customer_id` varchar(30) NOT NULL,
  `total_amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_discount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `invoice_discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `previous` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paytype` int(11) DEFAULT NULL,
  `bank_id` varchar(255) DEFAULT NULL,
  `bkash_id` varchar(255) DEFAULT NULL,
  `details` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (1, 'serv-20210301074951', '2021-03-10', '2', '1', '1000.00', '0.00', '0.00', '0.00', '1002.00', '0.00', '0.00', '2.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (2, 'serv-20210511093509', '2021-05-11', '25', '1', '1000.00', '0.00', '0.00', '0.00', '361000.00', '0.00', '0.00', '360000.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (3, 'serv-20210511073026', '2021-05-11', '25', '1', '1000.00', '0.00', '0.00', '0.00', '1000.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (4, 'serv-20210511073238', '2021-05-11', '25', '1', '1000.00', '0.00', '0.00', '0.00', '1000.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (5, 'serv-20210511073441', '2021-05-11', '25', '1', '1000.00', '0.00', '0.00', '0.00', '1000.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (6, 'serv-20210511073718', '2021-05-11', '25', '1', '100.00', '0.00', '0.00', '0.00', '100.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (7, 'serv-20210512082413', '2021-05-12', '25', '1', '1000.00', '0.00', '0.00', '0.00', '1000.00', '0.00', '0.00', '0.00', 1, NULL, NULL, 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (8, 'serv-20210512093953', '2021-05-12', '25', '1', '2000.00', '0.00', '0.00', '0.00', '2000.00', '0.00', '0.00', '0.00', 4, NULL, '', 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (9, 'serv-20210512094105', '2021-05-12', '25', '1', '3000.00', '0.00', '0.00', '0.00', '3000.00', '0.00', '0.00', '0.00', 3, NULL, 'KHL1ROAY71', 'Service Invoice');
INSERT INTO `service_invoice` (`id`, `voucher_no`, `date`, `employee_id`, `customer_id`, `total_amount`, `total_discount`, `invoice_discount`, `total_tax`, `paid_amount`, `due_amount`, `shipping_cost`, `previous`, `paytype`, `bank_id`, `bkash_id`, `details`) VALUES (10, 'serv-20210512094242', '2021-05-12', '25', '1', '10000.00', '0.00', '0.00', '0.00', '10000.00', '0.00', '0.00', '0.00', 4, 'L3FNC8O9AD', '', 'Service Invoice');


#
# TABLE STRUCTURE FOR: service_invoice_details
#

DROP TABLE IF EXISTS `service_invoice_details`;

CREATE TABLE `service_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `service_inv_id` varchar(30) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (1, 1, 'serv-20200906092122', '1.00', '4500.00', '0.00', '0.00', '4500.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (2, 6, 'serv-20210301074951', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (3, 3, 'serv-20210511093509', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (4, 10, 'serv-20210511073026', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (5, 6, 'serv-20210511073238', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (6, 6, 'serv-20210511073441', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (7, 8, 'serv-20210511073718', '1.00', '100.00', '0.00', '0.00', '100.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (8, 6, 'serv-20210512082413', '1.00', '1000.00', '0.00', '0.00', '1000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (9, 6, 'serv-20210512093953', '2.00', '1000.00', '0.00', '0.00', '2000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (10, 10, 'serv-20210512094105', '3.00', '1000.00', '0.00', '0.00', '3000.00');
INSERT INTO `service_invoice_details` (`id`, `service_id`, `service_inv_id`, `qty`, `charge`, `discount`, `discount_amount`, `total`) VALUES (11, 5, 'serv-20210512094242', '10000.00', '1.00', '0.00', '0.00', '10000.00');


#
# TABLE STRUCTURE FOR: sms_settings
#

DROP TABLE IF EXISTS `sms_settings`;

CREATE TABLE `sms_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(100) DEFAULT NULL,
  `api_secret` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `isinvoice` int(11) NOT NULL DEFAULT 0,
  `isservice` int(11) NOT NULL DEFAULT 0,
  `isreceive` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `sms_settings` (`id`, `api_key`, `api_secret`, `from`, `isinvoice`, `isservice`, `isreceive`) VALUES (1, 'C20047385da5a06aec2c21.99251389', '', '8809601000500', 1, 1, 1);


#
# TABLE STRUCTURE FOR: sub_module
#

DROP TABLE IF EXISTS `sub_module`;

CREATE TABLE `sub_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `directory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (1, 1, 'new_invoice', NULL, NULL, 'new_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (2, 1, 'manage_invoice', NULL, NULL, 'manage_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (3, 1, 'pos_invoice', NULL, NULL, 'pos_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (4, 9, 'c_o_a', NULL, NULL, 'show_tree', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (5, 9, 'supplier_payment', NULL, NULL, 'supplier_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (6, 9, 'customer_receive', NULL, NULL, 'customer_receive', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (7, 9, 'debit_voucher', NULL, NULL, 'debit_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (8, 9, 'credit_voucher', NULL, NULL, 'credit_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (9, 9, 'voucher_approval', NULL, NULL, 'aprove_v', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (10, 9, 'contra_voucher', NULL, NULL, 'contra_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (11, 9, 'journal_voucher', NULL, NULL, 'journal_voucher', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (12, 9, 'report', NULL, NULL, 'ac_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (13, 9, 'cash_book', NULL, NULL, 'cash_book', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (14, 9, 'Inventory_ledger', NULL, NULL, 'inventory_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (15, 9, 'bank_book', NULL, NULL, 'bank_book', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (16, 9, 'general_ledger', NULL, NULL, 'general_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (17, 9, 'trial_balance', NULL, NULL, 'trial_balance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (18, 9, 'cash_flow', NULL, NULL, 'cash_flow_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (19, 9, 'coa_print', NULL, NULL, 'coa_print', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (21, 3, 'category', NULL, NULL, 'manage_category', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (22, 3, 'add_product', NULL, NULL, 'create_product', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (23, 3, 'import_product_csv', NULL, NULL, 'add_product_csv', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (24, 3, 'manage_product', NULL, NULL, 'manage_product', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (25, 2, 'add_customer', NULL, NULL, 'add_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (26, 2, 'manage_customer', NULL, NULL, 'manage_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (27, 2, 'credit_customer', NULL, NULL, 'credit_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (28, 2, 'paid_customer', NULL, NULL, 'paid_customer', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (30, 3, 'unit', NULL, NULL, 'manage_unit', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (31, 4, 'add_supplier', NULL, NULL, 'add_supplier', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (32, 4, 'manage_supplier', NULL, NULL, 'manage_supplier', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (33, 4, 'supplier_ledger', NULL, NULL, 'supplier_ledger_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (35, 5, 'add_purchase', NULL, NULL, 'add_purchase', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (36, 5, 'manage_purchase', NULL, NULL, 'manage_purchase', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (37, 7, 'return', NULL, NULL, 'add_return', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (38, 7, 'stock_return_list', NULL, NULL, 'return_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (39, 7, 'supplier_return_list', NULL, NULL, 'supplier_return_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (40, 7, 'wastage_return_list', NULL, NULL, 'wastage_return_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (41, 11, 'tax_settings', NULL, NULL, 'tax_settings', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (43, 6, 'stock_report', NULL, NULL, 'stock_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (46, 8, 'closing', NULL, NULL, 'add_closing', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (47, 8, 'closing_report', NULL, NULL, 'closing_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (48, 8, 'todays_report', NULL, NULL, 'all_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (49, 8, 'todays_customer_receipt', NULL, NULL, 'todays_customer_receipt', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (50, 8, 'sales_report', NULL, NULL, 'todays_sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (51, 8, 'due_report', NULL, NULL, 'retrieve_dateWise_DueReports', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (52, 8, 'purchase_report', NULL, NULL, 'todays_purchase_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (53, 8, 'purchase_report_category_wise', NULL, NULL, 'purchase_report_category_wise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (54, 8, 'sales_report_product_wise', NULL, NULL, 'product_sales_reports_date_wise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (55, 8, 'sales_report_category_wise', NULL, NULL, 'sales_report_category_wise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (56, 10, 'add_new_bank', NULL, NULL, 'add_bank', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (57, 10, 'bank_transaction', NULL, NULL, 'bank_transaction', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (58, 10, 'manage_bank', NULL, NULL, 'bank_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (59, 14, 'generate_commission', NULL, NULL, 'commission', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (60, 12, 'add_designation', NULL, NULL, 'add_designation', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (61, 12, 'manage_designation', NULL, NULL, 'manage_designation', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (62, 12, 'add_employee', NULL, NULL, 'add_employee', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (63, 12, 'manage_employee', NULL, NULL, 'manage_employee', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (64, 12, 'add_attendance', NULL, NULL, 'add_attendance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (65, 12, 'manage_attendance', NULL, NULL, 'manage_attendance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (66, 12, 'attendance_report', NULL, NULL, 'attendance_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (67, 12, 'add_benefits', NULL, NULL, 'add_benefits', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (68, 12, 'manage_benefits', NULL, NULL, 'manage_benefits', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (69, 12, 'add_salary_setup', NULL, NULL, 'add_salary_setup', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (70, 12, 'manage_salary_setup', NULL, NULL, 'manage_salary_setup', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (71, 12, 'salary_generate', NULL, NULL, 'salary_generate', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (72, 12, 'manage_salary_generate', NULL, NULL, 'manage_salary_generate', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (73, 12, 'salary_payment', NULL, NULL, 'salary_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (74, 12, 'add_expense_item', NULL, NULL, 'add_expense_item', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (75, 12, 'manage_expense_item', NULL, NULL, 'manage_expense_item', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (76, 12, 'add_expense', NULL, NULL, 'add_expense', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (77, 12, 'manage_expense', NULL, NULL, 'manage_expense', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (78, 12, 'expense_statement', NULL, NULL, 'expense_statement', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (79, 12, 'add_person_officeloan', NULL, NULL, 'add1_person', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (80, 12, 'add_loan_officeloan', NULL, NULL, 'add_office_loan', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (81, 12, 'add_payment_officeloan', NULL, NULL, 'add_loan_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (82, 12, 'manage_loan_officeloan', NULL, NULL, 'manage1_person', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (83, 12, 'add_person_personalloan', NULL, NULL, 'add_person', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (84, 12, 'add_loan_personalloan', NULL, NULL, 'add_loan', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (85, 12, 'add_payment_personalloan', NULL, NULL, 'add_payment', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (86, 12, 'manage_loan_personalloan', NULL, NULL, 'manage_person', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (87, 15, 'manage_company', NULL, NULL, 'manage_company', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (88, 15, 'add_user', NULL, NULL, 'add_user', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (89, 15, 'manage_users', NULL, NULL, 'manage_user', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (90, 15, 'language', NULL, NULL, 'add_language', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (91, 15, 'currency', NULL, NULL, 'add_currency', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (92, 15, 'setting', NULL, NULL, 'soft_setting', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (93, 15, 'add_role', NULL, NULL, 'add_role', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (94, 15, 'role_list', NULL, NULL, 'role_list', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (95, 15, 'user_assign_role', NULL, NULL, 'user_assign', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (96, 15, 'Permission', NULL, NULL, NULL, 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (97, 8, 'shipping_cost_report', NULL, NULL, 'shipping_cost_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (98, 8, 'user_wise_sales_report', NULL, NULL, 'user_wise_sales_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (99, 8, 'invoice_return', NULL, NULL, 'invoice_return', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (100, 8, 'supplier_return', NULL, NULL, 'supplier_return', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (101, 8, 'tax_report', NULL, NULL, 'tax_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (102, 8, 'profit_report', NULL, NULL, 'profit_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (103, 11, 'add_incometax', NULL, NULL, 'add_incometax', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (104, 11, 'manage_income_tax', NULL, NULL, 'manage_income_tax', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (105, 13, 'add_service', NULL, NULL, 'create_service', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (106, 13, 'manage_service', NULL, NULL, 'manage_service', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (107, 13, 'service_invoice', NULL, NULL, 'service_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (108, 13, 'manage_service_invoice', NULL, NULL, 'manage_service_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (109, 11, 'tax_report', NULL, NULL, 'tax_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (110, 11, 'invoice_wise_tax_report', NULL, NULL, 'invoice_wise_tax_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (111, 2, 'customer_advance', NULL, NULL, 'customer_advance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (112, 4, 'supplier_advance', NULL, NULL, 'supplier_advance', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (113, 2, 'customer_ledger', NULL, NULL, 'customer_ledger', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (114, 1, 'gui_pos', NULL, NULL, 'gui_pos', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (115, 15, 'sms_configure', NULL, NULL, 'sms_configure', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (116, 15, 'backup_restore', NULL, NULL, 'back_up', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (117, 15, 'import', NULL, NULL, 'sql_import', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (118, 15, 'restore', NULL, NULL, 'restore', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (119, 16, 'add_quotation', NULL, NULL, 'add_quotation', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (120, 16, 'manage_quotation', NULL, NULL, 'manage_quotation', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (121, 16, 'add_to_invoice', NULL, NULL, 'add_to_invoice', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (122, 8, 'purchase_report_shelf_wise', NULL, NULL, 'purchase_report_shelf_wise', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (123, 1, 'sales_cheque_report', NULL, NULL, 'sales_cheque_report', 1);
INSERT INTO `sub_module` (`id`, `mid`, `name`, `description`, `image`, `directory`, `status`) VALUES (124, 5, 'purchase_cheque_report', NULL, NULL, 'purchase_cheque_report', 1);


#
# TABLE STRUCTURE FOR: supplier_information
#

DROP TABLE IF EXISTS `supplier_information`;

CREATE TABLE `supplier_information` (
  `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` text NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `emailnumber` varchar(200) DEFAULT NULL,
  `email_address` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('10', 'Shenzhen Mindray Bio-Medical Electronics Co., Ltd', 'Mindray Building, Keji 12th Road South, High-tech Industrial Park, Nanshan, Shenzhen 518057. China.', '', '', 'intl-market@mindray.com', '', '', '+86 755 81 888 998', '+86 755 26 58 2500', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('9', 'GE-Biomedical', '1301, 105-dong, LH1 complex, 3 dong, Gansok, Namdong-gu, Incheon', '', '', '', '', '', '', '', '', '', '', 'Korea', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('8', 'VINNO Technology (Suzhou) Co., Ltd', '5F, A Building, No.27 Xinfa Rd, Suzhou  Industrial Park, 215123', '', '', 'vinno@vinno.com', '', '', '+86 (512) 62873806', '+86 0521 62873801', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('11', 'TEKNOVA Medical Systems Limited', 'Teknova Building, 2 Yongjie North Road, Haidian, Beijing, 100094,China', '', '', '', '', '', '86-10-57682233', '86-10-57682236', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('12', 'Shenzhen Comen Medical Instruments Co., Ltd.', 'No.2 of FIYTA Timepiece Building, Nanhuan Avenue, Gongming sub-district, Guangming New District, Shenzhen, China', '', '', '', '', '', '186 1234 0291', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('13', 'Boditech Med Inc.', '43, Geodudanji 1-gil, Dongnae-myeon, Chuncheon-si, Gangwon-do , Republic of Korea 24398', '', '', 'kyr1@boditech.co.kr', '', '', '82-33-243-1400', '82-33-243-9373', '', '', '', 'Korea', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('14', 'BMC Medical Co., Ltd.', 'Room 110 Tower A Fengyu Building, No. 115 Fucheng Road, Haidian, 100036 Beijing, PEOPLE?S REPUBILC OF CHINA', '', '', '', '', '', '86-10-51663880', '86-10-51663880', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('15', 'Hunan VentMed Medical Technology Co., Ltd.', 'The 3rd Floor, Building No.13,  Area 1 of Xiangshang Industrial Park, Shaoyang City, Hunan, 422000, China', '', '', '', '', '', '', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('16', 'SHENZHEN EAST MEDICAL TECHNOLOGY  CO., LTD ', '190# longping Road, Huate Industrial Zone, longgang District,  Shenzhen ,Guang  Dong, 518116, China', '', '', 'info@east-medical.com', 'Support@east-medical.com', '', '0755-33275355', '0755-22658200', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('17', 'SHENZHEN EMPEROR ELECTRONIC TECHNOLOGY CO., LTD', '2 & 3/F BUILDING 15, NO.1008 SONGBAI ROAD, NANSHAN DISTRICT,SHENZHEN 518108, CHINA', '', '', '', '', '', '', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('18', 'WUHAN ZONCARE BIO-M EDICAL ELECTRONICS CO.,LTD', '#380, High-tech 2nd Road, Eastlake High-tech Development Zone Wuhan, Hubei 430206, China', '', '', '', '', '', '', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('19', 'XIAN HAIYE MEDICAL EQUIPMENT., LTD', 'Fengjing Industrial Park,xian  city,Shaanxi Provice,China.', '', '', '', '', '', '', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('20', 'Garnier Diagnostic GMbH', 'Unter Gereuth 101F-79453 Bahlingen Germany', '', '', '', '', '', '', '', '', '', '', 'Germany', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('21', 'CARETIUM MEDICAL INSTRUMENTS CO., LIMITED', 'Beishan Industrial Park 7 th Floor Building 1, Beishan Road, Yantian, Shenzhen 518083 China', '', '', 'Info@caretium.com', '', '', '+86 755 25273714', '+86 755 25273096', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('22', 'Shenzhen Prokan Electronics Inc.', 'No. 1002, Building 4, Fantasia MIC Plaza, Pengji Pioneering Park, the west of  Nanhai Road, Nanshan District , Shenzhen, China', '', '', '', '', '', '86-755-26952867', '86-755-26747910', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('23', 'GENORAY CO., LTD.', '#512, 560, Dunchon-daero, Jungwon-gu, Seongnam-si, Gyeonggi-do, 462-716 KOREA', '', '', '', '', '', '+82 31 627 3900', '+82 31 627 3905', '', '', '', 'Korea', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('24', 'Philosys Co. Ltd', '827-3, Sangpyeong-ri, Okgu-eup, Gunsan-si, Jeollabuk-do, 573-901, Korea ', '', '', '', '', '', '82-63-453-142', '82-63-453-1423', '', '', '', 'Korea', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('25', 'BIOTEC UK LTD', 'Unit 20 Cloud Hill, Temple Cloud, Bristol, UK, BS39 5BX', '', '', '', '', '', ' +44(0)1761 568187', '+44(0)1761 502660', '', '', '', 'UK', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('26', 'Greiner Diagnostic GmbH', 'Unter Gereuth 10, 79353D- Bahingen', '', '', '', '', '', '', '', '', '', '', 'Germany', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('27', 'Shijiazhuang Hipro Biotechnology Co. Ltd', 'No.3 Building, Fangyi Tech. Park , No.313 ZhujiangRD, Shijiazhuang, P.R. China 050035', '', '', '', '', '', '+86 0311-83832628', '', '', '', '', 'China', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('28', 'Local Purchase', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('29', '3s', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('30', 'Devenport', 'Chittagong', 'dd', '0182636383', 'mainul@gmail.com', 'mainul@gmail.com', '938498', '', '8663', 'Chittagong', 'Nowakhali', '6543', 'Afghanistan', 'ss', 1);
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `address2`, `mobile`, `emailnumber`, `email_address`, `contact`, `phone`, `fax`, `city`, `state`, `zip`, `country`, `details`, `status`) VALUES ('31', 'Max', 'Hathazrai,chittgaong', '', '0736347', 'irfamna@gmail.com', 'irfamna@gmail.com', '938498', '', '8663', 'Chittagong', 'Nowakhali', '6543', 'Afghanistan', '', 1);


#
# TABLE STRUCTURE FOR: supplier_product
#

DROP TABLE IF EXISTS `supplier_product`;

CREATE TABLE `supplier_product` (
  `supplier_pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(30) CHARACTER SET utf8 NOT NULL,
  `product_id_two` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `products_model` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `supplier_price` float DEFAULT NULL,
  PRIMARY KEY (`supplier_pr_id`),
  KEY `product_id` (`product_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `product_id_two` (`product_id_two`)
) ENGINE=InnoDB AUTO_INCREMENT=2457 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1259, '2843455156', NULL, 'VINNO X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1260, '5148948637', NULL, 'VINNO X2', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1261, '3938951913', NULL, 'VINNO E10', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1262, '5555351171', NULL, 'VINNO E20', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1263, '7438924265', NULL, 'VINNO E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1264, '4546547519', NULL, 'VINNO E35', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1265, '5195545178', NULL, 'VINNO G86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1266, '4219525235', NULL, 'VINNO G55', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1267, '1972189594', NULL, 'VINNO G50', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1268, '2662697126', NULL, 'VINNO M86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1269, '9731893189', NULL, 'VINNO A5', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1270, '3875773582', NULL, 'VINNO Q5-2P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1271, '5149633487', NULL, 'VINNO Q5-3C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1272, '9945127681', NULL, 'X2-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1273, '9343989748', NULL, 'S1-8C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1274, '9475139111', NULL, 'G2-5C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1275, '7443813654', NULL, 'F2-5C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1276, '1316262584', NULL, 'G3-10PX', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1277, '5929997531', NULL, 'S1-6P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1278, '9886314157', NULL, 'G1-4P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1279, '7987512769', NULL, 'X6-16L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1280, '4936976335', NULL, 'F4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1281, '7529243325', NULL, 'X4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1282, '6375327469', NULL, 'F4-9E', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1283, '9686224336', NULL, 'D3-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1284, '9852175535', NULL, 'X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1285, '7146199194', NULL, 'X2/E10/E20', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1286, '3369824413', NULL, 'E35/E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1287, '6864216257', NULL, 'X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1288, '5772864542', NULL, 'E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1289, '1935839834', NULL, 'E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1290, '9592695249', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1291, '3521547382', NULL, 'GE-55', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1292, '2757363889', NULL, 'G-55 Power', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1293, '8336198396', NULL, 'GE-30', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1294, '6587576339', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1295, '4327545645', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1296, '4628199575', NULL, 'GE-30/55', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1297, '9729888287', NULL, 'GA12A', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1298, '4884397693', NULL, 'GE-B5L', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1299, '6674433346', NULL, 'GE-W5L', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1300, '8757523455', NULL, 'MSA99', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1301, '2257774628', NULL, 'GE-600E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1302, '6782215817', NULL, 'GE-600F', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1303, '1573161142', NULL, 'GE-600K', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1304, '6668542599', NULL, 'GE-600H', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1305, '9777316782', NULL, 'BM50', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1306, '6288455251', NULL, 'BM80', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1307, '7456261964', NULL, 'BM100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1308, '2396577658', NULL, 'C12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1309, '7143696355', NULL, 'YE660E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1310, '7285837625', NULL, 'Yuwell Mercury ', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1311, '3736218733', NULL, 'VD', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1312, '2954947986', NULL, 'DWS', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1313, '6672222391', NULL, 'MD-DOME-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1314, '7356116167', NULL, 'MD-LED-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1315, '9826917368', NULL, 'ZEUS-400P', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1316, '9377125474', NULL, 'Star-x1', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1317, '1215918771', NULL, 'UA-5', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1318, '1772782465', NULL, 'Combo12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1319, '9471356172', NULL, 'Combo14', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1320, '1272116647', NULL, 'F10', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1321, '7726828562', NULL, 'RM-06', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1322, '5661328717', NULL, '2?-20?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1323, '1758682233', NULL, '5?-50?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1324, '4165569882', NULL, '10?-100?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1325, '8538119366', NULL, '100?-1000?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1326, '5752613625', NULL, 'GEW-1100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1327, '5197163347', NULL, 'GEW-1100P', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1328, '5181975849', NULL, 'Holter', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1329, '2437184128', NULL, 'EEG32', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1330, '5581369278', NULL, 'RAU-760', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1331, '4518129762', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1332, '5942767541', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1333, '7853354164', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1334, '1738149264', NULL, 'ZNC 961A', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1335, '9268243184', NULL, 'ES-20', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1336, '6694249826', NULL, 'DC-80', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1337, '3258766741', NULL, 'DC-40', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1338, '6775697698', NULL, 'DC-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1339, '6594565634', NULL, 'DP-5', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1340, '9897235318', NULL, 'DP-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1341, '9156237765', NULL, 'DP-30 Power', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1342, '8783292385', NULL, 'DP-20', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1343, '4918811552', NULL, 'DP-2200Plus', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1344, '6446751889', NULL, 'P4-2', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1345, '3317486227', NULL, '2P2P', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1346, '2356314763', NULL, '7L4A', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1347, '6495846295', NULL, '75L38P', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1348, '2313527547', NULL, '65C15EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1349, '2991457183', NULL, '75L38EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1350, '8533619747', NULL, '65EC10EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1351, '4629898217', NULL, 'DC-40', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1352, '5951731564', NULL, 'HD3', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1353, '3814491574', NULL, 'TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1354, '3894416291', NULL, 'TH-5500', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1355, '8827256147', NULL, 'TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1356, '2178518875', NULL, 'TH-280', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1357, '9445252919', NULL, 'TH-100', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1358, '3694378569', NULL, 'TH-80', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1359, '6293879451', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1360, '5838763117', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1361, '1667554119', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1362, '2245643832', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1363, '6645641962', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1364, '7474318313', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1365, '6942288527', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1366, '7629292724', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1367, '2864725418', NULL, 'CM-300', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1368, '4135169698', NULL, 'H3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1369, '4675833737', NULL, 'CM-600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1370, '3116482865', NULL, 'CM-1200', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1371, '2899227697', NULL, 'CM-1200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1372, '9952281153', NULL, 'CM-1200B', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1373, '9275255232', NULL, 'NC3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1374, '3755863594', NULL, 'STAR-80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1375, '7964522476', NULL, 'STAR-800', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1376, '5842917997', NULL, 'STAR-8000', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1377, '8189848332', NULL, 'C80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1378, '4813244596', NULL, 'M200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1379, '4484951513', NULL, 'ME600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1380, '8288374373', NULL, 'C60', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1381, '8773975986', NULL, 'NV6', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1382, '2421247686', NULL, 'NV8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1383, '8978119488', NULL, 'C-21', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1384, '3337121539', NULL, 'C-22', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1385, '9781949433', NULL, 'STAR-5000F', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1386, '8526371633', NULL, 'AX-700', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1387, '2862325668', NULL, 'AX-400', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1388, '3967372682', NULL, 'S8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1389, '1377442837', NULL, 'B3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1390, '8329223998', NULL, NULL, '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1391, '1872347729', NULL, 'I-CHROMA 3', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1392, '5511931216', NULL, 'I-CHROMA II ', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1393, '3352973834', NULL, 'I-CHROMA I', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1394, '9511242719', NULL, 'I-CHROMA D', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1395, '1161491479', NULL, 'I-CHAMBER', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1396, '7615687119', NULL, 'Hemochroma Plus', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1397, '4895382719', NULL, 'Microcuvettes (4x50Test)', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1398, '7195121167', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1399, '3216627413', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1400, '7655173492', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1401, '7764665445', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1402, '1417918162', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1403, '6423536839', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1404, '6357473488', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1405, '7454831891', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1406, '8946745234', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1407, '2498181191', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1408, '6898792843', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1409, '5554682713', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1410, '1893136696', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1411, '5298893112', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1412, '2429149716', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1413, '4546546581', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1414, '6353784466', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1415, '8752914136', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1416, '8334185553', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1417, '8773411725', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1418, '2538456999', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1419, '2499975675', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1420, '2621382698', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1421, '4256679267', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1422, '6143512631', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1423, '1148433558', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1424, '2654463849', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1425, '4135729952', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1426, '6682728432', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1427, '9495845845', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1428, '2582876253', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1429, '2248351141', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1430, '8797842743', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1431, '6426767679', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1432, '8518955588', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1433, '3642841697', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1434, '4493976874', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1435, '3384814842', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1436, '6821969783', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1437, '6251979411', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1438, '5939893419', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1439, '9324293269', NULL, '10T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1440, '7387988641', NULL, '10T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1441, '8739541485', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1442, '1485871169', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1443, '2137669984', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1444, '3845379354', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1445, '3918913383', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1446, '8769215268', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1447, '2572267786', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1448, '1787166462', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1449, '2868861482', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1450, '7715392324', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1451, '9697242388', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1452, '2781229564', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1453, '2565938858', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1454, '1176677355', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1455, '2975861677', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1456, '1437658225', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1457, '2339122142', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1458, '9927771828', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1459, '4855786715', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1460, '1168471154', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1461, '1575876721', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1462, '5959328231', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1463, '8146163666', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1464, '5652764211', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1465, '7768974535', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1466, '4314145151', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1467, '2321556517', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1468, '2843783532', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1469, '2519589534', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1470, '3563683915', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1471, '6865661967', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1472, '2546741495', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1473, '7995244274', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1474, '1764337295', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1475, '2642665859', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1476, '2291793661', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1477, '6622439423', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1478, '7675594945', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1479, '6726493952', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1480, '4624914121', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1481, '6715554299', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1482, '6548249563', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1483, '9346217726', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1484, '5359235523', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1485, '1832979644', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1486, '1284429583', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1487, '6949218551', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1488, '4126881671', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1489, '1929339648', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1490, '8398617377', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1491, '7659636316', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1492, '9228497249', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1493, '8582682244', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1494, '5844496386', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1495, '9479393469', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1496, '4891977537', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1497, '4951643178', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1498, '7187275171', NULL, 'E-20A-H-0', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1499, '3799345234', NULL, 'T-20T', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1500, '5895999689', NULL, 'T-20A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1501, '5637688944', NULL, 'T-25T', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1502, '2736882971', NULL, 'T-25A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1503, '4938164876', NULL, 'DS6', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1504, '6916716397', NULL, 'DS7', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1505, '5671241182', NULL, 'DS8', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1506, '2936914712', NULL, 'C08', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1507, '4237799475', NULL, 'B18', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1508, '8921497628', NULL, 'BMC', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1509, '2324441249', NULL, 'BMC', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1510, '3839695256', NULL, 'EM600', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1511, '6713179231', NULL, 'EM20', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1512, '3446615115', NULL, 'EM30', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1513, '8936226836', NULL, 'EMC-6W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1514, '4555327897', NULL, 'EMC-6W Plus', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1515, '5372982581', NULL, 'EMC-12W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1516, '2859588513', NULL, 'MBM', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1517, '1686324392', NULL, 'SS10', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1518, '9176568815', NULL, 'WS-D ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1519, '6358599257', NULL, 'WS-M ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1520, '9986551495', NULL, 'TTI-20 ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1521, '7219788628', NULL, NULL, '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1522, '4737522819', NULL, NULL, '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1523, '5762642827', NULL, 'EM-90', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1524, '5375468168', NULL, 'EM-88B', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1525, '8873712992', NULL, '1.6', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1526, '3962145892', NULL, '1.2', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1527, '6814121678', NULL, 'K2 - 2ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1528, '1678997171', NULL, 'K2 - 1ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1529, '1787848191', NULL, 'Glucose Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1530, '6715763934', NULL, 'PT Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1531, '8676288331', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1532, '7942186628', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1533, '8454399715', NULL, '23G', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1534, '3319616961', NULL, '22G', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1535, '3286725696', NULL, 'EMP-168', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1536, '7897816453', NULL, 'EMP-168 Plus', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1537, '2926127773', NULL, 'M201', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1538, '3562122915', NULL, 'ZQ-1206', '18', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1539, '1716176948', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1540, '7596111372', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1541, '7331373379', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1542, '8253462458', NULL, 'GA-400', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1543, '5369237952', NULL, 'G-3000', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1544, '4552722583', NULL, 'XC-A30', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1545, '2971169895', NULL, 'XC-A10', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1546, '4729448229', NULL, 'XI-921F', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1547, '1563668612', NULL, 'XI-921B', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1548, '4126963142', NULL, 'XI-921C', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1549, '9944671976', NULL, 'ABR', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1550, '8117891656', NULL, 'ABW', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1551, '5356318447', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1552, '5846724774', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1553, '4935195371', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1554, '8455685974', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1555, '5544212149', NULL, 'AB', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1556, '1867765211', NULL, 'K', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1557, '7253739751', NULL, 'Na', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1558, '5243217747', NULL, 'Cl', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1559, '4913779895', NULL, 'Ca', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1560, '9642465368', NULL, 'PH', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1561, '6773888811', NULL, 'Ref', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1562, '1147954734', NULL, 'KU-11B', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1563, '6247236746', NULL, 'Combo11', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1564, '8497479996', NULL, 'PE-6800 ', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1565, '8979593575', NULL, 'PE-6800 Plus', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1566, '5473485388', NULL, 'PE-6100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1567, '8884478882', NULL, 'PE-6000', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1568, '2831635462', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1569, '8821893664', NULL, 'PE-C01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1570, '3935557384', NULL, 'PE-L01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1571, '6793366295', NULL, 'PE-C03', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1572, '6659251855', NULL, 'PE-C02', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1573, '7166558558', NULL, 'PE-7100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1574, '2831635462', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1575, '4842251218', NULL, 'PE-L05 DIFF', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1576, '9586168847', NULL, 'PE-L05 LH', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1577, '2717758124', NULL, 'ZEN-7000', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1578, '4158351621', NULL, 'OSCAR Classic', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1579, '5746869762', NULL, 'PORT-X IV', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1580, '9228758242', NULL, 'GXI-1 (Size1)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1581, '2588478183', NULL, 'GXI-1 (Size2)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1582, '6396559635', NULL, 'PAPAYA', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1583, '2321969647', NULL, 'Gmate Voice', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1584, '8817756176', NULL, 'Gmate Smart', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1585, '3418456388', NULL, 'Gmate Origin', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1586, '2438838219', NULL, '1x25T', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1587, '2294835351', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1588, '7116413444', NULL, '5x18ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1589, '3768121812', NULL, '5x5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1590, '8536543756', NULL, '320ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1591, '9277734445', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1592, '1388671424', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1593, '4657627551', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1594, '9271873415', NULL, '2x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1595, '6667539651', NULL, '1x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1596, '1989624282', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1597, '4948525419', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1598, '1456263546', NULL, '1x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1599, '1983317329', NULL, 'R1:30ml+R2:10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1600, '6861179588', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1601, '2256342295', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1602, '4658245595', NULL, '3x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1603, '9863433837', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1604, '7188685954', NULL, '2x20ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1605, '9253978826', NULL, 'R1:40ml+R2:10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1606, '8631545735', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1607, '2285355535', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1608, '4428289715', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1609, '9623957341', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1610, '5592197738', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1611, '8665143478', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1612, '1226933891', NULL, '1 x 5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1613, '9577921344', NULL, '3x10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1614, '9173749488', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1615, '4142539657', NULL, '4 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1616, '5798357723', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1617, '9313141336', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1618, '9917978532', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1619, '3567576917', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1620, '3865186472', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1621, '1186784897', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1622, '6734967662', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1623, '5183744911', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1624, '2119624677', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1625, '8948414252', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1626, '9242575137', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1627, '8779895562', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1628, '2215956861', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1629, '8593152652', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1630, '1892337664', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1631, '7932117111', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1632, '1144172969', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1633, '2962887548', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1634, '6343267557', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1635, '4347897512', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1636, '8143864125', NULL, '1x100T', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1637, '5844693731', NULL, '1x100T', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1638, '9525126168', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1639, '4348247759', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1640, '7298869743', NULL, '2x50ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1641, '1264486972', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1642, '3258545635', NULL, '2x50ml/2x50ml/2x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1643, '2714348718', NULL, '1x50ml/1x50ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1644, '4644154595', NULL, '2x50ml/1x5ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1645, '9277734445', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1646, '1413684349', NULL, '1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1647, '3273898723', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1648, '5383217834', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1649, '3584783529', NULL, '5x50ml/1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1650, '9271873415', NULL, '2x500ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1651, '6667539651', NULL, '1x500ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1652, '4476946598', NULL, '2x50ml1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1653, '7183868353', NULL, '2x50ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1654, '9541235365', NULL, '2x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1655, '4993216187', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1656, '3417835385', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1657, '8631592977', NULL, '1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1658, '1125632858', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1659, '8273837439', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1660, '2337937131', NULL, '1x100ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1661, '5657889839', NULL, '4x25ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1662, '4129317591', NULL, '1x25ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1663, '1761795386', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1664, '8235237728', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1665, '8193818341', NULL, '2x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1666, '4176813719', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1667, '6484116382', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1668, '1869748356', NULL, '4x50ml/2x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1669, '6967295899', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1670, '9131985537', NULL, '6x10ml/4x9ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1671, '6344827597', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1672, '9777456475', NULL, '2x10ml/1x2ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1673, '4186944761', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1674, '6771825426', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1675, '8597134772', NULL, '1x50ml/1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1676, '7795518719', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1677, '4551329481', NULL, '6x10ml/2x10ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1678, '3319214269', NULL, '6x10ml/1x6ml/2x8ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1679, '3662146861', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1680, '3532723533', NULL, '5x25ml/5x5ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1681, '9533999746', NULL, '7x10ml/2x7ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1682, '7629727862', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1683, '9953877613', NULL, '1x20T/Box', '27', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1684, '6946671654', NULL, 'TR-200B', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1685, '3418361985', NULL, 'YZ-200B', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1686, '8316832455', NULL, 'TRF100', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1687, '3989637186', NULL, 'BD2', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1688, '1183162814', NULL, 'BD4', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1689, '3925526482', NULL, 'ALPHA-250BL', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1690, '5452881291', NULL, 'ALPHA-250ML', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1691, '1261981573', NULL, 'KS12', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1692, '3816934786', NULL, 'KS9', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1693, '1143377923', NULL, 'KS5', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1694, '6565231634', NULL, '3008A', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1695, '6443997611', NULL, '3008', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1696, '4417731939', NULL, 'Baby', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1697, '8471558167', NULL, 'Adult', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1698, '3151295589', NULL, '12x15', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1699, '4611525699', NULL, '10x12', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1700, '5566899532', NULL, '9x9', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1701, '2856132812', NULL, '8x22', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1702, '5735389578', NULL, 'X-Ray', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1703, '4637223249', NULL, 'LRD-750', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1704, '5581599345', NULL, '30 Lit', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1705, '5821693564', NULL, '30 Lit', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1706, '9311884962', NULL, '12C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1707, '1184685756', NULL, '6C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1708, '9531997612', NULL, '3C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1709, '1523292185', NULL, '1x20P', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1710, '5284825754', NULL, 'Bio', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1711, '4456528868', NULL, 'VINNO X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1712, '4696732938', NULL, 'VINNO X2', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1713, '7389724325', NULL, 'VINNO E10', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1714, '4765445279', NULL, 'VINNO E20', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1715, '2834359327', NULL, 'VINNO E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1716, '1929461153', NULL, 'VINNO E35', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1717, '3779353959', NULL, 'VINNO G86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1718, '4783754532', NULL, 'VINNO G55', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1719, '8696259814', NULL, 'VINNO G50', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1720, '3283591785', NULL, 'VINNO M86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1721, '5886672278', NULL, 'VINNO A5', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1722, '6566947571', NULL, 'VINNO Q5-2P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1723, '8585589386', NULL, 'VINNO Q5-3C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1724, '8152127891', NULL, 'X2-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1725, '2796719876', NULL, 'S1-8C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1726, '9636457652', NULL, 'G2-5C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1727, '6599141487', NULL, 'F2-5C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1728, '1872259259', NULL, 'G3-10PX', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1729, '2416581233', NULL, 'S1-6P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1730, '4328726368', NULL, 'G1-4P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1731, '6441139638', NULL, 'X6-16L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1732, '7251277887', NULL, 'F4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1733, '1533299912', NULL, 'X4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1734, '1144478743', NULL, 'F4-9E', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1735, '5161789344', NULL, 'D3-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1736, '9851694355', NULL, 'X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1737, '8383922839', NULL, 'X2/E10/E20', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1738, '5236425547', NULL, 'E35/E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1739, '1557674762', NULL, 'X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1740, '3773341427', NULL, 'E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1741, '1487613633', NULL, 'E30', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1742, '5941771868', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1743, '9616611459', NULL, 'GE-55', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1744, '8717673197', NULL, 'G-55 Power', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1745, '9228593948', NULL, 'GE-30', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1746, '9726948453', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1747, '5252267764', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1748, '7262587346', NULL, 'GE-30/55', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1749, '6334627293', NULL, 'GA12A', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1750, '6611936926', NULL, 'GE-B5L', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1751, '6821332784', NULL, 'GE-W5L', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1752, '7513713834', NULL, 'MSA99', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1753, '9936751979', NULL, 'GE-600E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1754, '2841894497', NULL, 'GE-600F', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1755, '6587113441', NULL, 'GE-600K', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1756, '7929183322', NULL, 'GE-600H', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1757, '8198661854', NULL, 'BM50', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1758, '4213262152', NULL, 'BM80', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1759, '1821869114', NULL, 'BM100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1760, '4743336271', NULL, 'C12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1761, '8897513969', NULL, 'YE660E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1762, '1881921933', NULL, 'Yuwell Mercury ', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1763, '6893756244', NULL, 'VD', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1764, '3886734397', NULL, 'DWS', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1765, '7642528445', NULL, 'MD-DOME-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1766, '5112799153', NULL, 'MD-LED-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1767, '2836827672', NULL, 'ZEUS-400P', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1768, '4543929987', NULL, 'Star-x1', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1769, '7232251388', NULL, 'UA-5', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1770, '3928612488', NULL, 'Combo12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1771, '6661977372', NULL, 'Combo14', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1772, '9761671751', NULL, 'F10', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1773, '3358587124', NULL, 'RM-06', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1774, '9238513172', NULL, '2?-20?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1775, '1798412687', NULL, '5?-50?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1776, '2535396335', NULL, '10?-100?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1777, '5557184192', NULL, '100?-1000?', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1778, '1439398115', NULL, 'GEW-1100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1779, '7586576347', NULL, 'GEW-1100P', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1780, '1998485279', NULL, 'Holter', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1781, '5662176248', NULL, 'EEG32', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1782, '6436468587', NULL, 'RAU-760', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1783, '6274319558', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1784, '4199535253', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1785, '4374214124', NULL, '3*6*12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1786, '3247591212', NULL, 'ZNC 961A', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1787, '4775698881', NULL, 'ES-20', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1788, '5315359158', NULL, 'DC-80', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1789, '7778652939', NULL, 'DC-40', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1790, '9931274952', NULL, 'DC-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1791, '1446379269', NULL, 'DP-5', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1792, '6392551586', NULL, 'DP-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1793, '7184728861', NULL, 'DP-30 Power', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1794, '4213151234', NULL, 'DP-20', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1795, '2623194597', NULL, 'DP-2200Plus', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1796, '3194694582', NULL, 'P4-2', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1797, '4341921546', NULL, '2P2P', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1798, '2128947796', NULL, '7L4A', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1799, '2887397411', NULL, '75L38P', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1800, '5526138756', NULL, '65C15EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1801, '8514821994', NULL, '75L38EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1802, '5834525246', NULL, '65EC10EA', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1803, '6192115648', NULL, 'DC-40', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1804, '1849735638', NULL, 'HD3', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1805, '5796878152', NULL, 'TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1806, '8751536782', NULL, 'TH-5500', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1807, '8349492925', NULL, 'TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1808, '3586512567', NULL, 'TH-280', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1809, '9868369719', NULL, 'TH-100', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1810, '2389131292', NULL, 'TH-80', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1811, '9965231272', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1812, '7729984788', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1813, '5236725826', NULL, 'TH-5500/TH-5000', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1814, '4278848519', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1815, '1172619675', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1816, '9672718652', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1817, '9587437833', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1818, '9358882651', NULL, 'TH-280/TH-280Pro', '11', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1819, '1242599921', NULL, 'CM-300', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1820, '1192819584', NULL, 'H3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1821, '1855339733', NULL, 'CM-600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1822, '1887527919', NULL, 'CM-1200', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1823, '9666415975', NULL, 'CM-1200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1824, '7563789947', NULL, 'CM-1200B', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1825, '1279611574', NULL, 'NC3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1826, '3418372517', NULL, 'STAR-80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1827, '9726285294', NULL, 'STAR-800', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1828, '4811589239', NULL, 'STAR-8000', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1829, '8371334143', NULL, 'C80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1830, '6253958672', NULL, 'M200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1831, '4954162128', NULL, 'ME600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1832, '1632746253', NULL, 'C60', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1833, '4246589622', NULL, 'NV6', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1834, '2231324238', NULL, 'NV8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1835, '9666114841', NULL, 'C-21', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1836, '6568126326', NULL, 'C-22', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1837, '9135253755', NULL, 'STAR-5000F', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1838, '9518239599', NULL, 'AX-700', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1839, '6727514564', NULL, 'AX-400', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1840, '7894432256', NULL, 'S8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1841, '5459397349', NULL, 'B3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1842, '9645717684', NULL, NULL, '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1843, '2679567975', NULL, 'I-CHROMA 3', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1844, '4214479668', NULL, 'I-CHROMA II ', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1845, '5614323342', NULL, 'I-CHROMA I', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1846, '7934346238', NULL, 'I-CHROMA D', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1847, '9496376696', NULL, 'I-CHAMBER', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1848, '1915253656', NULL, 'Hemochroma Plus', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1849, '7659468621', NULL, 'Microcuvettes (4x50Test)', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1850, '6664747866', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1851, '3934349581', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1852, '5454257198', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1853, '6443539437', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1854, '5397458958', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1855, '7445423447', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1856, '1689237236', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1857, '2912845237', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1858, '8187958386', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1859, '4326619931', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1860, '1918245589', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1861, '6914147955', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1862, '1149599467', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1863, '5554997554', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1864, '1451127364', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1865, '7897347685', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1866, '7385245673', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1867, '1562715579', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1868, '6788886465', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1869, '9498432752', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1870, '8981847349', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1871, '6455475511', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1872, '6544421341', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1873, '9336217935', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1874, '1467687252', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1875, '9752447858', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1876, '7455173111', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1877, '8799527175', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1878, '5434626969', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1879, '5699284555', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1880, '4145356416', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1881, '8192149516', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1882, '1242548991', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1883, '4326953842', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1884, '1136615636', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1885, '4957871368', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1886, '8584587336', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1887, '6479471679', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1888, '2226514633', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1889, '4681218648', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1890, '9499789534', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1891, '3293261741', NULL, '10T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1892, '2249549912', NULL, '10T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1893, '5293234895', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1894, '4739849259', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1895, '8875348399', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1896, '5534117998', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1897, '7193966912', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1898, '8983982792', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1899, '6633932469', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1900, '3811115855', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1901, '1299747425', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1902, '1833823775', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1903, '6715134151', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1904, '1845844432', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1905, '4148284893', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1906, '4558294165', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1907, '7467298876', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1908, '8368955149', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1909, '2364757486', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1910, '5614729443', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1911, '9582729367', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1912, '2263666538', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1913, '8848184975', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1914, '5337445831', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1915, '1936817729', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1916, '6444637394', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1917, '8537638351', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1918, '6795489535', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1919, '4517682357', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1920, '8435324392', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1921, '8455747736', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1922, '4388491582', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1923, '5781737777', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1924, '8145643587', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1925, '3259143895', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1926, '4841372988', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1927, '9552296996', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1928, '2969174943', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1929, '3614228788', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1930, '9272976929', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1931, '1579985881', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1932, '6915421684', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1933, '4945328265', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1934, '7366369941', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1935, '1454461366', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1936, '2868835341', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1937, '8338318971', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1938, '4928482455', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1939, '1545655198', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1940, '5583586216', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1941, '8132698363', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1942, '1169375364', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1943, '4312239259', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1944, '2583314438', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1945, '8515935512', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1946, '4842161265', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1947, '1515999221', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1948, '7222666157', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1949, '9378719235', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1950, '6583139562', NULL, 'E-20A-H-0', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1951, '3132635576', NULL, 'T-20T', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1952, '5197249763', NULL, 'T-20A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1953, '9423856788', NULL, 'T-25T', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1954, '2857182255', NULL, 'T-25A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1955, '5971886579', NULL, 'DS6', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1956, '4249331745', NULL, 'DS7', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1957, '2363197228', NULL, 'DS8', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1958, '1484681886', NULL, 'C08', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1959, '1744459356', NULL, 'B18', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1960, '5523415166', NULL, 'BMC', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1961, '7416557377', NULL, 'BMC', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1962, '5667667455', NULL, 'EM600', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1963, '1648325386', NULL, 'EM20', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1964, '1276551862', NULL, 'EM30', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1965, '6248341192', NULL, 'EMC-6W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1966, '3331536617', NULL, 'EMC-6W Plus', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1967, '3919928954', NULL, 'EMC-12W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1968, '9331617421', NULL, 'MBM', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1969, '2619891995', NULL, 'SS10', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1970, '6564136739', NULL, 'WS-D ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1971, '8616611153', NULL, 'WS-M ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1972, '8524946523', NULL, 'TTI-20 ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1973, '2793228282', NULL, NULL, '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1974, '5728358582', NULL, NULL, '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1975, '6313944592', NULL, 'EM-90', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1976, '5231274259', NULL, 'EM-88B', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1977, '7158919383', NULL, '1.6', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1978, '1173844433', NULL, '1.2', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1979, '8953255711', NULL, 'K2 - 2ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1980, '1791149275', NULL, 'K2 - 1ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1981, '1244392495', NULL, 'Glucose Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1982, '3922521449', NULL, 'PT Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1983, '6927369915', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1984, '7156163851', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1985, '9892511224', NULL, '23G', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1986, '5634799729', NULL, '22G', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1987, '7329387965', NULL, 'EMP-168', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1988, '1885677457', NULL, 'EMP-168 Plus', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1989, '7397674837', NULL, 'M201', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1990, '1837566265', NULL, 'ZQ-1206', '18', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1991, '6116471734', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1992, '3275431893', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1993, '2353923493', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1994, '4656599649', NULL, 'GA-400', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1995, '3232143985', NULL, 'G-3000', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1996, '4981914364', NULL, 'XC-A30', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1997, '1256596414', NULL, 'XC-A10', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1998, '1345295453', NULL, 'XI-921F', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (1999, '3963763657', NULL, 'XI-921B', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2000, '7954893239', NULL, 'XI-921C', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2001, '9523531759', NULL, 'ABR', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2002, '6253887984', NULL, 'ABW', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2003, '4426732318', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2004, '6289215998', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2005, '7346918772', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2006, '3581276136', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2007, '2153515247', NULL, 'AB', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2008, '1281429817', NULL, 'K', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2009, '8571356513', NULL, 'Na', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2010, '6549633275', NULL, 'Cl', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2011, '5579917955', NULL, 'Ca', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2012, '9997785478', NULL, 'PH', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2013, '9268515343', NULL, 'Ref', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2014, '9641375199', NULL, 'KU-11B', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2015, '6647698981', NULL, 'Combo11', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2016, '3399629528', NULL, 'PE-6800 ', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2017, '1277782583', NULL, 'PE-6800 Plus', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2018, '6743967222', NULL, 'PE-6100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2019, '1619993515', NULL, 'PE-6000', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2020, '7931261892', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2021, '7113563411', NULL, 'PE-C01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2022, '9755581379', NULL, 'PE-L01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2023, '9871852837', NULL, 'PE-C03', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2024, '9216415178', NULL, 'PE-C02', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2025, '5689363999', NULL, 'PE-7100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2026, '7931261892', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2027, '5825611453', NULL, 'PE-L05 DIFF', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2028, '3821899247', NULL, 'PE-L05 LH', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2029, '7793692534', NULL, 'ZEN-7000', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2030, '9314353487', NULL, 'OSCAR Classic', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2031, '1774255455', NULL, 'PORT-X IV', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2032, '6612651358', NULL, 'GXI-1 (Size1)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2033, '2429235752', NULL, 'GXI-1 (Size2)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2034, '4157134796', NULL, 'PAPAYA', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2035, '3464428342', NULL, 'Gmate Voice', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2036, '7867294951', NULL, 'Gmate Smart', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2037, '7173789696', NULL, 'Gmate Origin', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2038, '3639453956', NULL, '1x25T', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2039, '2637999115', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2040, '4139866291', NULL, '5x18ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2041, '1822923573', NULL, '5x5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2042, '4692729294', NULL, '320ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2043, '9372649962', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2044, '7195421819', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2045, '1991761544', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2046, '9783299447', NULL, '2x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2047, '2878227578', NULL, '1x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2048, '7961767331', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2049, '8918383781', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2050, '9476418391', NULL, '1x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2051, '1776556876', NULL, 'R1:30ml+R2:10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2052, '3388128524', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2053, '5363594547', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2054, '1636852454', NULL, '3x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2055, '5554969321', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2056, '8366371148', NULL, '2x20ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2057, '8118762997', NULL, 'R1:40ml+R2:10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2058, '1653279166', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2059, '2488684363', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2060, '3196269665', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2061, '2268497759', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2062, '7184574954', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2063, '5768845667', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2064, '4859956884', NULL, '1 x 5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2065, '2338671556', NULL, '3x10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2066, '7521432296', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2067, '2599272916', NULL, '4 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2068, '1418718231', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2069, '3356513148', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2070, '1734256644', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2071, '6163412469', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2072, '4279465742', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2073, '9441683765', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2074, '1987936938', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2075, '3839921722', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2076, '5986222194', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2077, '4646764747', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2078, '6622384791', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2079, '4787982115', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2080, '6992253282', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2081, '5235839413', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2082, '1451334141', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2083, '6971331912', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2084, '4727163157', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2085, '9299636177', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2086, '9492576413', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2087, '5836485845', NULL, '96 Wells/kit', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2088, '2684461981', NULL, '1x100T', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2089, '2519239947', NULL, '1x100T', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2090, '5522867467', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2091, '1352918566', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2092, '5581525118', NULL, '2x50ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2093, '7156195114', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2094, '2197958815', NULL, '2x50ml/2x50ml/2x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2095, '6265825467', NULL, '1x50ml/1x50ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2096, '3219137432', NULL, '2x50ml/1x5ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2097, '9372649962', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2098, '5231172889', NULL, '1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2099, '2722912237', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2100, '4526697712', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2101, '9131533994', NULL, '5x50ml/1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2102, '9783299447', NULL, '2x500ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2103, '2878227578', NULL, '1x500ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2104, '6141843663', NULL, '2x50ml1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2105, '1717769589', NULL, '2x50ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2106, '8519919343', NULL, '2x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2107, '1973267621', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2108, '6265324586', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2109, '6984677972', NULL, '1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2110, '7195569324', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2111, '7284727779', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2112, '4379912126', NULL, '1x100ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2113, '4628839177', NULL, '4x25ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2114, '8535529725', NULL, '1x25ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2115, '4122611361', NULL, '4x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2116, '3834343947', NULL, '1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2117, '7361811566', NULL, '2x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2118, '9623295577', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2119, '7948337159', NULL, '5x20ml/1x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2120, '2558639315', NULL, '4x50ml/2x20ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2121, '2862357398', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2122, '9817133394', NULL, '6x10ml/4x9ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2123, '7395666256', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2124, '1222771993', NULL, '2x10ml/1x2ml/1x100ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2125, '2596988168', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2126, '9855519144', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2127, '6229676775', NULL, '1x50ml/1x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2128, '3895653534', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2129, '4178176636', NULL, '6x10ml/2x10ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2130, '6631552547', NULL, '6x10ml/1x6ml/2x8ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2131, '7849343635', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2132, '6519946419', NULL, '5x25ml/5x5ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2133, '9525713816', NULL, '7x10ml/2x7ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2134, '6827538136', NULL, '2x50ml', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2135, '1242924829', NULL, '1x20T/Box', '27', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2136, '2914458656', NULL, 'TR-200B', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2137, '9354862679', NULL, 'YZ-200B', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2138, '3975624485', NULL, 'TRF100', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2139, '5728214469', NULL, 'BD2', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2140, '6387675471', NULL, 'BD4', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2141, '3577549665', NULL, 'ALPHA-250BL', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2142, '5464237861', NULL, 'ALPHA-250ML', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2143, '4345318812', NULL, 'KS12', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2144, '6153681742', NULL, 'KS9', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2145, '8578154552', NULL, 'KS5', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2146, '1918128319', NULL, '3008A', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2147, '5624257672', NULL, '3008', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2148, '6868241943', NULL, 'Baby', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2149, '8866474555', NULL, 'Adult', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2150, '2992172168', NULL, '12x15', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2151, '3912387213', NULL, '10x12', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2152, '9429446382', NULL, '9x9', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2153, '7736255228', NULL, '8x22', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2154, '4943379145', NULL, 'X-Ray', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2155, '9537915311', NULL, 'LRD-750', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2156, '9147297194', NULL, '30 Lit', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2157, '1985532774', NULL, '30 Lit', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2158, '5746451529', NULL, '12C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2159, '1681157715', NULL, '6C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2160, '8292697989', NULL, '3C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2161, '1914924872', NULL, '1x20P', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2162, '6533569276', NULL, 'Bio', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2164, '36115132', '', NULL, '28', '500');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2165, '73816743', NULL, 'a', '26', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2166, '74449829', NULL, 'a', '27', '2');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2167, '3842544848', '225754', 'AT223', '29', '5000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2168, 'AB12', NULL, 'Apple', '29', '12000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2169, '123456', NULL, 'Apple', '29', '18000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2170, '76857784', NULL, '', '30', '12000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2171, '16185741', NULL, 'Lenovo', '31', '12000');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2172, '8194641933', NULL, 'VINNO X1', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2173, '5384297979', NULL, 'VINNO X2', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2174, '9796547961', NULL, 'VINNO E35', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2175, '8743134669', NULL, 'VINNO G86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2176, '3556896232', NULL, 'VINNO G55', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2177, '7556587957', NULL, 'VINNO M86', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2178, '1157987336', NULL, 'VINNO A5', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2179, '4823166214', NULL, 'VINNO Q5-2P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2180, '8631517688', NULL, 'GE-75', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2181, '4129568149', NULL, 'GE-55', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2182, '2879635131', NULL, 'G-55 Power', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2183, '9116169934', NULL, 'GE-30', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2184, '4384348761', NULL, 'GA12A', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2185, '4835518163', NULL, 'RAU-760', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2186, '8867892527', NULL, 'ES-20', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2187, '7853112211', NULL, 'DC-40', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2188, '9629846392', NULL, 'DC-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2189, '3179993239', NULL, 'DP-30', '10', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2190, '6448984473', NULL, 'CM-300', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2191, '1326583713', NULL, 'H3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2192, '9248637841', NULL, 'CM-600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2193, '1192373378', NULL, 'CM-1200', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2194, '3557531835', NULL, 'CM-1200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2195, '5463311253', NULL, 'CM-1200B', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2196, '6174458454', NULL, 'AX-700', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2197, '1881714245', NULL, 'AX-400', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2198, '5783737968', NULL, 'S8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2199, '9948395736', NULL, 'B3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2200, '6839916491', NULL, 'EM600', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2201, '9992976661', NULL, 'EMP-168', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2202, '8282721699', NULL, 'GA-400', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2203, '5632456713', NULL, 'G-3000', '20', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2204, '1454799134', NULL, 'XC-A30', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2205, '7923155884', NULL, 'XC-A10', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2206, '6416327776', NULL, 'XI-921F', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2207, '5641423541', NULL, 'XI-921B', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2208, '7297219966', NULL, 'Gmate Voice', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2209, '7467524672', NULL, 'Gmate Origin', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2210, '7989587485', NULL, 'BD4', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2211, '1441368684', NULL, 'PE-7100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2212, '8737545392', NULL, 'PE-6800 ', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2213, '5139257912', NULL, 'PE-6100', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2214, '1876956835', NULL, 'PE-6000', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2215, '8833549535', NULL, 'I-CHROMA III', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2216, '7597372623', NULL, 'I-CHROMA II ', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2217, '6862212785', NULL, 'I-CHROMA I', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2218, '3383818458', NULL, 'I-CHAMBER', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2219, '1235922924', NULL, 'Holter', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2220, '8235793453', NULL, '30 Lit', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2221, '1518119886', NULL, 'M200A', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2222, '5851769878', NULL, 'ME600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2223, '4367638455', NULL, 'M201', '17', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2224, '3972528298', NULL, '5 to 50', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2225, '4621718787', NULL, '10 to 100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2226, '8684151135', NULL, '100 to 1000', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2227, '9999226584', NULL, 'NV8', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2228, '5613677763', NULL, 'STAR-8000', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2229, '4623429536', NULL, 'STAR-5000F', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2230, '3152364182', NULL, 'C-21', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2231, '9153611259', NULL, 'C-22', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2232, '4231951747', NULL, 'C60', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2233, '3746146883', NULL, 'C80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2234, '3423692267', NULL, 'STAR-80', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2235, '8285285679', NULL, 'STAR-800', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2236, '1131281664', NULL, 'Star-x1', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2237, '4657918118', NULL, 'RM-06', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2238, '5443631793', NULL, 'MSA99', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2239, '8915867135', NULL, 'UA-5', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2240, '9441263216', NULL, 'E-20A-H-0', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2241, '6325133548', NULL, 'T-20A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2242, '3997774678', NULL, 'T-25T', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2243, '8346822271', NULL, 'T-25A', '14', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2244, '6999358231', NULL, 'DS6', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2245, '6215367998', NULL, 'DS7', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2246, '4656751716', NULL, 'DS8', '15', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2247, '5123784439', NULL, 'MD-DOME-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2248, '3617269838', NULL, 'MD-LED-A2', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2249, '9461723365', NULL, 'GE-600E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2250, '8443599994', NULL, 'GE-600F', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2251, '6733377216', NULL, 'GE-600K', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2252, '8953566891', NULL, 'GE-600H', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2253, '3641417998', NULL, 'OSCAR Classic', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2254, '9337436433', NULL, 'PORT-X IV', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2255, '3274796189', NULL, 'GXI-1 (Size1)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2256, '1744294715', NULL, 'GXI-1 (Size2)', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2257, '5416582713', NULL, 'PAPAYA', '23', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2258, '6838279275', NULL, 'WS-D ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2259, '9519524674', NULL, 'WS-M ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2260, '5688512335', NULL, 'DWS', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2261, '9635834937', NULL, 'TTI-20 ', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2262, '8489837141', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2263, '4896144193', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2264, '6398993964', NULL, 'HYHJ-KC', '19', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2265, '8653295383', NULL, 'VD', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2266, '7781816413', NULL, 'BM50', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2267, '4697882478', NULL, 'BM80', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2268, '7963479494', NULL, 'BM100', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2269, '1781421355', NULL, 'EM20', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2270, '1351131926', NULL, 'EM30', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2271, '7662137229', NULL, 'EMC-6W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2272, '6729491722', NULL, 'EMC-6W Plus', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2273, '5547234376', NULL, 'EMC-12W', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2274, '1678884745', NULL, 'C12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2275, '1593344167', NULL, 'YE660E', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2276, '7534698948', NULL, 'Yuwell Mercury ', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2277, '5452548431', NULL, 'MBM', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2278, '7791722461', NULL, 'SS10', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2279, '7483252436', NULL, 'NC3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2280, '1696775945', NULL, 'EM 88B', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2281, '6169692765', NULL, 'EM 90', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2282, '3879733953', NULL, 'S5', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2283, '6112654952', NULL, 'GE 1200', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2284, '8328148362', NULL, 'ACC-555', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2285, '3744585147', NULL, 'Hemochroma', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2286, '4917624756', NULL, 'Bixolon', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2287, '1393124937', NULL, 'NF5', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2288, '3466953829', NULL, 'V3', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2289, '2352615913', NULL, 'SCD600', '12', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2290, '8683559377', NULL, 'ABR', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2291, '8726776763', NULL, 'ABW', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2292, '4915422648', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2293, '7156568734', NULL, 'K', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2294, '8117673258', NULL, 'Ref', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2295, '3594419797', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2296, '8894325419', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2297, '1569456693', NULL, '1x100ml', '21', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2298, '8659134665', NULL, 'PE-L05 LH', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2299, '1251938787', NULL, 'PE-L05 DIFF', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2300, '5772838984', NULL, 'PE-C02', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2301, '8249934627', NULL, 'PE-L01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2302, '7352569134', NULL, 'PE-C03', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2303, '5184145439', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2304, '3857594389', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2305, '3864236446', NULL, 'PE-D01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2306, '4226781552', NULL, 'PE-C01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2307, '7487318631', NULL, 'PE-C01', '22', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2308, '7372382784', NULL, '12C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2309, '3425424751', NULL, '6C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2310, '2515297517', NULL, '3C', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2311, '3456545167', NULL, '1x20P', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2312, '6297429499', NULL, 'Bio', '28', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2313, '6856319346', NULL, 'Microcuvettes (4x50Test)', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2314, '5763154832', NULL, 'Combo12', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2315, '5752173282', NULL, 'Combo14', '9', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2316, '6617596817', NULL, '1x25T', '24', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2317, '6227553286', NULL, '3 Perameter', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2318, '8668617447', NULL, '6 Perameter', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2319, '5927393775', NULL, 'K2 - 2ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2320, '6484247138', NULL, 'K2 - 1ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2321, '1233593165', NULL, '1.6', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2322, '9669366916', NULL, '1.2', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2323, '3949747538', NULL, 'Glucose Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2324, '7674541228', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2325, '5369832539', NULL, '4ml', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2326, '4256799723', NULL, 'PT Tube', '16', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2327, '3596838483', NULL, 'F2-5C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2328, '6731135685', NULL, 'S1-6P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2329, '5583792327', NULL, 'G1-4P', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2330, '2617144677', NULL, 'F4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2331, '5736214316', NULL, 'X4-12L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2332, '5641569167', NULL, 'F4-9E', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2333, '9223446573', NULL, 'X6-16L', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2334, '3414633435', NULL, 'D3-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2335, '9922492249', NULL, 'G3-10PX', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2336, '3436818978', NULL, 'X2-6C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2337, '3888542581', NULL, 'S1-8C', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2338, '4113291242', NULL, 'G4-9E', '8', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2339, '3499334433', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2340, '7341318554', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2341, '3843811497', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2342, '4634155887', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2343, '1559954739', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2344, '6858364938', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2345, '8736732534', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2346, '1773518539', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2347, '6597424944', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2348, '8334297379', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2349, '5677534155', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2350, '4485373345', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2351, '4536519646', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2352, '2918635995', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2353, '3275965861', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2354, '6664339371', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2355, '9998828155', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2356, '5596323913', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2357, '3624959212', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2358, '1959955457', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2359, '3715744636', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2360, '1942827899', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2361, '9656891125', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2362, '6824489138', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2363, '8651498492', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2364, '6426238123', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2365, '1674336661', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2366, '9321221791', NULL, '10T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2367, '8948617998', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2368, '8137391546', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2369, '3936713335', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2370, '3774161217', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2371, '8976766543', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2372, '1795292271', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2373, '5892256987', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2374, '3272959214', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2375, '3213725222', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2376, '1879722246', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2377, '4929987137', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2378, '7885855298', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2379, '7171255436', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2380, '6857342114', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2381, '4287261574', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2382, '8791847418', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2383, '5447634557', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2384, '6397327735', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2385, '5623556612', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2386, '4762575886', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2387, '3736636859', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2388, '9584998659', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2389, '9622127662', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2390, '7441799686', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2391, '2141216677', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2392, '2337659117', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2393, '1364335166', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2394, '7899993842', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2395, '2456266691', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2396, '5546495489', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2397, '1113358753', NULL, '1V/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2398, '5869714618', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2399, '9569666959', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2400, '9446377713', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2401, '9918916456', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2402, '5731359711', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2403, '3541322884', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2404, '6495363367', NULL, '25T/Box', '13', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2405, '2692752815', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2406, '3777345752', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2407, '4171948659', NULL, '1x4.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2408, '1762348291', NULL, '1x2.5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2409, '8799312542', NULL, '2x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2410, '3375437882', NULL, '2x500ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2411, '1723625578', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2412, '4357754792', NULL, '1 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2413, '1575118388', NULL, '4x100ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2414, '8564658871', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2415, '6964727495', NULL, '320ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2416, '3426524174', NULL, '25T/Box', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2417, '6589679472', NULL, '25T/Box', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2418, '8775938632', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2419, '6359174854', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2420, '4712788199', NULL, '4x100ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2421, '1981223579', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2422, '9198282795', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2423, '2681641555', NULL, '5x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2424, '4258473384', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2425, '5874171628', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2426, '6318311453', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2427, '6971576655', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2428, '1632916347', NULL, '1 x 10ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2429, '3282162161', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2430, '3669974567', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2431, '8865838858', NULL, '2x60ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2432, '5467936471', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2433, '4259885949', NULL, '5x5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2434, '4259885949', NULL, '5x5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2435, '1991287521', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2436, '8541219475', NULL, '1x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2437, '2339981815', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2438, '4928737289', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2439, '6227314334', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2440, '6974944356', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2441, '8618298121', NULL, '1x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2442, '4693498455', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2443, '6145819145', NULL, 'Biotec', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2444, '7534242918', NULL, '4x100ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2445, '6482681373', NULL, 'Greiner', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2446, '2579737785', NULL, '1x100ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2447, '4696114732', NULL, '1x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2448, '9496548243', NULL, '3x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2449, '4741534367', NULL, '4x25ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2450, '2413512441', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2451, '2278241578', NULL, '2x50ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2452, '6864781347', NULL, '4 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2453, '5947587624', NULL, '4 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2454, '5423271468', NULL, '4 x 5 ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2455, '7277353965', NULL, '1 x 5ml', '25', '1');
INSERT INTO `supplier_product` (`supplier_pr_id`, `product_id`, `product_id_two`, `products_model`, `supplier_id`, `supplier_price`) VALUES (2456, '65592271', NULL, 'Apple', '31', '400');


#
# TABLE STRUCTURE FOR: synchronizer_setting
#

DROP TABLE IF EXISTS `synchronizer_setting`;

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tax_collection
#

DROP TABLE IF EXISTS `tax_collection`;

CREATE TABLE `tax_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `relation_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=312 DEFAULT CHARSET=utf8;

INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (1, '2020-09-05', '1', '9891822122');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (2, '2020-09-06', '', 'serv-20200906092122');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (3, '2020-09-08', '1', '2248277544');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (4, '2020-09-22', '1', '3814847537');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (5, '2020-10-12', '1', '6595645594');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (6, '2020-10-30', '1', '1892196676');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (7, '2020-10-28', '1', '2944371262');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (8, '2020-10-30', '1', '8525297768');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (9, '2020-10-12', '1', '7529493893');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (10, '2020-10-12', '1', '6536474572');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (11, '2020-10-12', '1', '2184135564');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (12, '2020-10-12', '1', '9319946586');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (13, '2020-10-13', '1', '4356889924');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (14, '2020-10-17', '1', '6198778562');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (15, '2020-10-19', '1', '7198272854');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (16, '2020-10-20', '1', '1475927865');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (17, '2020-10-27', '1', '6366994931');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (18, '2020-10-27', '1', '9239324787');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (19, '2020-10-30', '1', '6616531458');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (20, '2020-10-30', '3', '7366818892');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (21, '2020-11-02', '1', '3353167395');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (22, '2020-11-02', '1', '3165459358');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (23, '2020-11-02', '1', '8819813782');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (24, '2021-01-24', '1', '3761386268');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (25, '2021-01-24', '1', '5378578316');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (26, '2021-01-24', '1', '3927513214');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (27, '2021-01-24', '1', '8875457775');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (28, '2021-01-24', '1', '3145293223');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (29, '2021-01-24', '1', '5875785952');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (30, '2021-01-24', '1', '9822694857');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (31, '2021-01-24', '1', '9596518617');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (32, '2021-01-24', '1', '5823834579');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (33, '2021-01-24', '1', '7326886698');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (34, '2021-01-25', '1', '3635883598');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (35, '2021-01-25', '0', '5666849143');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (36, '2021-01-25', '11', '1779861862');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (37, '2021-01-28', '1', '5945696599');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (38, '2021-01-28', '1', '3751111393');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (39, '2021-01-28', '1', '3846414236');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (40, '2021-01-28', '1', '8759362288');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (41, '2021-01-28', '1', '3888153211');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (42, '2021-01-28', '1', '1467522937');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (43, '2021-01-28', '1', '7567438199');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (44, '2021-01-28', '1', '5947833322');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (45, '2021-01-28', '1', '9972259175');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (46, '2021-01-28', '1', '2496581534');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (47, '2021-01-28', '1', '9487585979');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (48, '2021-01-31', '1', '2654819245');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (49, '2021-01-31', '1', '7881639914');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (50, '2021-01-31', '1', '7467816541');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (51, '2021-02-01', '1', '6122252143');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (52, '2021-02-01', '1', '2712277659');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (53, '2021-02-01', '1', '9724499529');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (54, '2021-02-01', '1', '6952367914');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (55, '2021-02-01', '1', '2766356716');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (56, '2021-02-01', '1', '9928433335');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (57, '2021-02-01', '1', '6119185386');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (58, '2021-02-01', '1', '6131758591');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (59, '2021-02-01', '1', '5386234222');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (60, '2021-02-01', '1', '8563748448');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (61, '2021-02-01', '1', '6642919597');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (62, '2021-02-01', '1', '7677116155');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (63, '2021-02-01', '1', '8799942746');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (64, '2021-02-01', '1', '3327923759');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (65, '2021-02-01', '1', '9642683912');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (66, '2021-02-01', '1', '3449991678');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (67, '2021-02-01', '1', '1167493594');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (68, '2021-02-04', '1', '3115956328');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (69, '2021-02-04', '1', '5554934393');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (70, '2021-02-04', '1', '2471638444');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (71, '2021-02-04', '1', '5565914116');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (72, '2021-02-04', '1', '7412862894');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (73, '2021-02-04', '1', '9964843156');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (74, '2021-02-04', '1', '1354721965');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (75, '2021-02-04', '1', '2819135988');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (76, '2021-02-04', '1', '9359586915');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (77, '2021-02-04', '1', '3921748726');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (78, '2021-02-04', '1', '9723111685');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (79, '2021-02-04', '1', '4238435486');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (80, '2021-02-04', '1', '9598596669');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (81, '2021-02-04', '1', '9274443685');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (82, '2021-02-04', '1', '4595194589');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (83, '2021-02-04', '1', '5423232887');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (84, '2021-02-04', '1', '3222942489');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (85, '2021-02-04', '1', '3619372985');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (86, '2021-02-04', '1', '7862456351');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (87, '2021-02-04', '1', '5336177596');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (88, '2021-02-04', '1', '5747688739');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (89, '2021-02-04', '1', '5447156534');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (90, '2021-02-04', '1', '7965669816');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (91, '2021-02-04', '1', '1487749513');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (92, '2021-02-04', '1', '8515949467');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (93, '2021-02-06', '1', '2648948676');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (94, '2021-02-06', '1', '4511146685');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (95, '2021-02-07', '1', '8229568278');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (96, '2021-02-07', '1', '1338258778');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (97, '2021-02-07', '1', '5342481817');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (98, '2021-02-07', '1', '3479365827');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (99, '2021-02-08', '1', '9144825254');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (100, '2021-02-08', '1', '2779515233');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (101, '2021-02-08', '1', '3297232264');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (102, '2021-03-01', '1', '3695956857');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (103, '2021-03-01', '1', '6469676999');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (104, '2021-03-01', '1', '2998893262');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (105, '2021-03-01', '1', '9463765982');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (106, '2021-03-01', '1', '4644448232');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (107, '2021-03-01', '1', '1564378225');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (108, '2021-03-01', '1', '1186269789');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (109, '2021-03-01', '1', '3253412545');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (110, '2021-03-10', '1', 'serv-20210301074951');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (111, '2021-03-01', '1', '6153628196');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (112, '2021-03-01', '15', '2855654735');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (113, '2021-03-01', '1', '4995724328');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (114, '2021-03-01', '1', '3768413676');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (115, '2021-03-02', '1', '6882343251');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (116, '2021-03-02', '1', '1671988247');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (117, '2021-03-02', '1', '3299915762');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (118, '2021-03-02', '1', '7917242716');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (119, '2021-03-02', '1', '9915296799');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (120, '2021-03-02', '1', '8718992952');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (121, '2021-03-02', '1', '5212419716');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (122, '2021-03-02', '1', '3614993649');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (123, '2021-03-02', '1', '4272461894');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (124, '2021-03-02', '1', '8375922933');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (125, '2021-03-02', '1', '6741547767');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (126, '2021-03-02', '1', '8422974295');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (127, '2021-03-02', '1', '7617941253');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (128, '2021-03-02', '1', '5812536262');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (129, '2021-03-02', '1', '9882221923');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (130, '2021-03-02', '1', '9415175675');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (131, '2021-03-02', '1', '7988933414');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (132, '2021-03-02', '1', '8182371456');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (133, '2021-03-02', '1', '7339776484');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (134, '2021-03-02', '1', '7174884429');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (135, '2021-03-02', '1', '3657691246');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (136, '2021-03-02', '1', '9561932928');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (137, '2021-03-02', '1', '7822289426');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (138, '2021-03-02', '1', '8314931186');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (139, '2021-03-02', '1', '6619591538');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (140, '2021-03-03', '1', '4279714337');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (141, '2021-03-04', '1', '6793263511');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (142, '2021-03-04', '1', '1527391816');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (143, '2021-03-04', '1', '5999361338');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (144, '2021-03-04', '1', '2318982799');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (145, '2021-03-04', '1', '3453179452');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (146, '2021-03-04', '1', '5182483594');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (147, '2021-03-04', '1', '6632768457');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (148, '2021-03-04', '1', '6411639788');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (149, '2021-03-04', '1', '7543247116');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (150, '2021-03-04', '1', '8584277543');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (151, '2021-03-04', '1', '7766246411');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (152, '2021-03-04', '1', '4736776865');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (153, '2021-03-04', '1', '7323145782');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (154, '2021-03-04', '1', '8274572647');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (155, '2021-03-04', '1', '3544251322');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (156, '2021-03-04', '1', '2563294489');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (157, '2021-03-04', '1', '4384358963');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (158, '2021-03-04', '1', '9435534399');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (159, '2021-03-04', '1', '6226547416');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (160, '2021-03-04', '1', '8553944939');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (161, '2021-03-04', '1', '3645291488');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (162, '2021-03-04', '1', '7935532758');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (163, '2021-03-04', '1', '8145611732');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (164, '2021-03-04', '1', '5973252646');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (165, '2021-03-04', '1', '9794176598');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (166, '2021-03-04', '1', '2781328582');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (167, '2021-03-04', '1', '7798956728');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (168, '2021-03-04', '1', '4718882966');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (169, '2021-03-04', '1', '1118669998');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (170, '2021-03-04', '1', '7878486797');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (171, '2021-03-04', '1', '9582746687');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (172, '2021-03-04', '1', '2116927238');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (173, '2021-03-04', '1', '5146218447');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (174, '2021-03-05', '1', '4614843555');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (175, '2021-03-06', '1', '6348946546');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (176, '2021-03-06', '1', '9519159211');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (177, '2021-03-06', '1', '2411853819');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (178, '2021-03-06', '1', '5776611765');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (179, '2021-03-06', '1', '7782468998');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (180, '2021-03-06', '1', '4337892772');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (181, '2021-03-06', '1', '7534482791');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (182, '2021-03-06', '1', '4658217254');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (183, '2021-03-06', '1', '3437987338');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (184, '2021-03-06', '1', '4528836614');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (185, '2021-03-06', '1', '6494462635');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (186, '2021-03-06', '1', '5245743973');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (187, '2021-03-06', '1', '7798931156');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (188, '2021-03-06', '1', '7228888322');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (189, '2021-03-06', '1', '4686124774');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (190, '2021-03-07', '1', '1412648554');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (191, '2021-03-08', '1', '3165348613');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (192, '2021-03-08', '1', '4814112346');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (193, '2021-03-08', '1', '4999813441');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (194, '2021-03-08', '1', '6965517836');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (195, '2021-03-08', '1', '3139952278');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (196, '2021-03-08', '1', '7725897894');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (197, '2021-03-08', '1', '7536379844');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (198, '2021-03-08', '1', '7511525643');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (199, '2021-03-08', '1', '7732576846');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (200, '2021-03-08', '1', '7918455576');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (201, '2021-03-08', '1', '5266891887');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (202, '2021-03-08', '1', '1113431119');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (203, '2021-03-09', '1', '2253392211');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (205, '2021-03-16', '1', '9352546281');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (206, '2021-03-25', '1', '2264985222');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (207, '2021-03-25', '1', '1164176679');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (208, '2021-03-25', '1', '3973386179');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (209, '2021-03-25', '1', '9969782594');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (210, '2021-03-25', '1', '6114635735');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (211, '2021-03-25', '1', '7138836886');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (212, '2021-03-25', '1', '1888338823');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (213, '2021-03-25', '1', '1218181367');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (214, '2021-03-25', '1', '7332354786');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (215, '2021-03-25', '1', '6375478262');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (216, '2021-03-27', '1', '4926166185');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (217, '2021-03-27', '1', '9448597927');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (218, '2021-03-27', '1', '1232528626');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (219, '2021-03-27', '1', '9159635392');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (220, '2021-03-27', '1', '1323827998');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (221, '2021-03-27', '1', '6814359999');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (222, '2021-03-27', '1', '2552278371');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (223, '2021-03-27', '1', '6432292849');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (224, '2021-03-27', '1', '5263839321');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (225, '2021-03-27', '1', '2629643926');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (226, '2021-03-27', '1', '8252769232');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (227, '2021-03-27', '1', '4271334591');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (228, '2021-03-27', '1', '5886949939');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (229, '2021-03-27', '1', '1379457846');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (230, '2021-03-27', '1', '3396544515');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (231, '2021-03-27', '1', '5315366147');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (232, '2021-03-27', '1', '9983756362');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (233, '2021-03-27', '1', '7696669871');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (234, '2021-03-27', '1', '5127324531');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (235, '2021-03-27', '1', '3286114535');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (236, '2021-03-27', '1', '7582523617');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (237, '2021-03-27', '1', '7152591695');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (238, '2021-03-27', '1', '6251677767');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (239, '2021-03-27', '1', '3997628225');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (240, '2021-03-27', '1', '1918238786');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (241, '2021-03-27', '1', '6294572419');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (242, '2021-03-27', '1', '1275454887');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (243, '2021-03-27', '1', '2292454546');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (244, '2021-03-29', '1', '7689278855');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (245, '2021-03-31', '1', '9253615126');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (246, '2021-03-31', '1', '2576347663');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (247, '2021-03-31', '1', '5546344462');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (248, '2021-03-31', '1', '5287194455');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (249, '2021-03-31', '16', '2511261462');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (250, '2021-05-01', '1', '4626121573');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (251, '2021-05-01', '1', '8651763152');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (252, '2021-05-01', '17', '9619847637');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (253, '2021-05-01', '1', '9389624558');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (254, '2021-05-04', '1', '8466927281');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (255, '2021-05-04', '1', '1452189928');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (257, '2021-05-04', '1', '6236676735');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (259, '2021-05-05', '1', '5537139972');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (260, '2021-05-05', '1', '4881722577');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (261, '2021-05-05', '1', '6295714652');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (262, '2021-05-05', '1', '6721375756');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (263, '2021-05-05', '1', '9794571786');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (264, '2021-05-05', '1', '5935467793');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (265, '2021-05-05', '1', '4664169247');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (266, '2021-05-05', '1', '2738126449');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (267, '2021-05-05', '1', '6165572246');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (268, '2021-05-05', '1', '2685339961');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (269, '2021-05-05', '1', '8694694793');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (270, '2021-05-06', '1', '8342962114');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (271, '2021-05-06', '1', '1945198425');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (272, '2021-05-06', '1', '4654184897');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (273, '2021-05-06', '1', '8613692778');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (274, '2021-05-06', '1', '5624342686');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (275, '2021-05-06', '1', '2821288466');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (276, '2021-05-06', '1', '4824233858');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (277, '2021-05-06', '1', '6143567251');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (278, '2021-05-06', '1', '1896883372');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (279, '2021-05-06', '1', '7462669828');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (280, '2021-05-06', '1', '7317592698');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (281, '2021-05-06', '18', '4677891443');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (282, '2021-05-07', '1', '3596542794');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (283, '2021-05-08', '1', '5525882815');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (284, '2021-05-08', '1', '2787634453');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (285, '2021-05-08', '1', '6638297212');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (287, '2021-05-08', '1', '3278557576');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (290, '2021-05-04', '11', '9884721351');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (291, '2021-05-08', '1', '2945262316');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (292, '2021-05-04', '2', '9817814336');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (293, '2021-05-08', '17', '1659565657');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (294, '2021-05-09', '1', '2563871465');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (295, '2021-05-09', '1', '5971435433');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (296, '2021-05-11', '1', '3794749962');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (297, '2021-05-11', '1', '9686449863');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (298, '2021-05-11', '2', '1383352626');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (299, '2021-05-11', '1', '9322643114');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (300, '2021-05-11', '1', '8161128561');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (301, '2021-05-11', '11', '1938854338');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (302, '2021-05-11', '1', 'serv-20210511093509');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (303, '2021-05-11', '11', '7783187386');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (304, '2021-05-11', '1', 'serv-20210511073026');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (305, '2021-05-11', '1', 'serv-20210511073238');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (306, '2021-05-11', '1', 'serv-20210511073441');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (307, '2021-05-11', '1', 'serv-20210511073718');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (308, '2021-05-12', '1', 'serv-20210512082413');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (309, '2021-05-12', '1', 'serv-20210512093953');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (310, '2021-05-12', '1', 'serv-20210512094105');
INSERT INTO `tax_collection` (`id`, `date`, `customer_id`, `relation_id`) VALUES (311, '2021-05-12', '1', 'serv-20210512094242');


#
# TABLE STRUCTURE FOR: tax_settings
#

DROP TABLE IF EXISTS `tax_settings`;

CREATE TABLE `tax_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_value` float NOT NULL,
  `tax_name` varchar(250) NOT NULL,
  `nt` int(11) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: units
#

DROP TABLE IF EXISTS `units`;

CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `unit_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (4, '592GCM68ZUVT3RE', 'Unit', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (5, 'WQMRK1KEYNR14WG', 'Box', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (6, 'JRJ5KVGWXFKGMTF', 'Pcs', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (7, 'JJ7OUCOT6LDBJLV', 'Set', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (8, 'QYL1PBD64CM81L6', 'Pack', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (9, 'BDEQQTJ62L1N7R6', 'Kit', 1);
INSERT INTO `units` (`id`, `unit_id`, `unit_name`, `status`) VALUES (10, 'SESAU63KQHF282V', 'Vial', 1);


#
# TABLE STRUCTURE FOR: user_login
#

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL,
  `security_code` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (1, '2', 'gmebd@yahoo.com', '08e7d644d6334b55ba924f343e3b824d', 1, NULL, 0);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (2, '1', 'sonicictbd@gmail.com', '41d99b369894eb1ec3f461135132d8bb', 1, '200904082142', 1);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (3, '1', 'sonicictbd@gmail.com', '41d99b369894eb1ec3f461135132d8bb', 1, '200904082142', 1);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (4, '2', 'gmebd@yahoo.com', '08e7d644d6334b55ba924f343e3b824d', 1, '200905071406', 0);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (5, 'OpSoxJvBbbS8Rws', 'touhidalm82@gmail.com', '04c5a7b79f55a5df65f2610f436d5c47', 1, '201030122448', 1);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (6, 'tF2YChLBH86gHfG', 'gmebd@gmail.com', '41d99b369894eb1ec3f461135132d8bb', 2, NULL, 1);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (8, 'ijpPELEg1KWywCs', 'sales_gmebd@gmail.com', '41d99b369894eb1ec3f461135132d8bb', 2, NULL, 1);
INSERT INTO `user_login` (`id`, `user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES (9, 'V2DEJbIBFZq40dl', 'test@gmail.com', '41d99b369894eb1ec3f461135132d8bb', 2, NULL, 1);


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `company_name` varchar(250) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (1, '2', 'Engineering', 'Global Medical', NULL, NULL, NULL, NULL, NULL, 'http://erp.devenport.co/assets/dist/img/profile_picture/b4d9b0776d8f1b9d214c9005be86a5cb.png', 0);
INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (2, '1', 'User', 'Admin', NULL, NULL, NULL, NULL, NULL, 'http://knight-rider.co/assets/dist/img/profile_picture/profile.jpg', 1);
INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (3, 'OpSoxJvBbbS8Rws', 'Alam', 'Touhid', NULL, NULL, NULL, NULL, NULL, 'http://erp.devenport.co/assets/dist/img/profile_picture/profile.jpg', 1);
INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (4, 'tF2YChLBH86gHfG', 'Medical', 'Global', NULL, NULL, NULL, NULL, NULL, 'http://erp.devenport.co/assets/dist/img/profile_picture/5e83539cda6c6d92d7d6b8d37bccbb78.png', 1);
INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (6, 'ijpPELEg1KWywCs', 'Gmebd', 'Sales', NULL, NULL, NULL, NULL, NULL, 'https://erp.gmebdonline.com/assets/dist/img/profile_picture/profile.jpg', 1);
INSERT INTO `users` (`id`, `user_id`, `last_name`, `first_name`, `company_name`, `address`, `phone`, `gender`, `date_of_birth`, `logo`, `status`) VALUES (7, 'V2DEJbIBFZq40dl', 'Test', 'Test', NULL, NULL, NULL, NULL, NULL, 'https://localhost/gmebd/gmebd/assets/dist/img/profile_picture/profile.jpg', 1);


#
# TABLE STRUCTURE FOR: warrenty_return
#

DROP TABLE IF EXISTS `warrenty_return`;

CREATE TABLE `warrenty_return` (
  `return_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `invoice_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `invoice_details_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `purchase_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date_purchase` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date_return` varchar(30) CHARACTER SET latin1 NOT NULL,
  `byy_qty` float NOT NULL,
  `ret_qty` float NOT NULL,
  `was_qty` float NOT NULL,
  `customer_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supplier_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `product_rate` decimal(10,2) DEFAULT NULL,
  `deduction` float DEFAULT NULL,
  `total_deduct` decimal(10,2) DEFAULT NULL,
  `total_tax` decimal(10,2) DEFAULT NULL,
  `service_charge` decimal(10,2) NOT NULL,
  `total_ret_amount` decimal(10,2) DEFAULT NULL,
  `net_total_amount` decimal(10,2) DEFAULT NULL,
  `reason` text CHARACTER SET latin1 NOT NULL,
  `usablity` int(5) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `product_id` (`product_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `customer_id` (`customer_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('169785726914412', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '2', '0', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 2);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('193318379231355', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '0', '2', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 3);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('223885923854389', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '1', '0', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '400.00', '400.00', '', 4);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('236364795516345', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '0', '2', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 3);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('344415564143587', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '0', '1', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '400.00', '900.00', '', 3);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('392355567275216', '1234567', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '1', '0', '1', '', '400.00', '0', '0.00', '0.00', '200.00', '500.00', '500.00', '', 4);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('447156327772556', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '0', '-2', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 3);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('454833824193821', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '2', '0', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 2);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('651795456654658', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '2', '0', '1', '', '400.00', '0', '0.00', '0.00', '200.00', '800.00', '800.00', '', 4);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('738766649757729', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '2', '0', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '800.00', '800.00', '', 4);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('776387414412651', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '1', '0', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '400.00', '400.00', '', 4);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('836858874456692', '1234567', '2944371262', '', '', '2020-10-28', '2020-10-29', '201', '0', '1', '1', '', '500.00', '0', '0.00', '0.00', '0.00', '500.00', '900.00', '', 3);
INSERT INTO `warrenty_return` (`return_id`, `product_id`, `invoice_id`, `invoice_details_id`, `purchase_id`, `date_purchase`, `date_return`, `byy_qty`, `ret_qty`, `was_qty`, `customer_id`, `supplier_id`, `product_rate`, `deduction`, `total_deduct`, `total_tax`, `service_charge`, `total_ret_amount`, `net_total_amount`, `reason`, `usablity`) VALUES ('967872356689966', '0909', '2944371262', '', '', '2020-10-28', '2020-10-29', '20', '0', '1', '1', '', '400.00', '0', '0.00', '0.00', '0.00', '400.00', '400.00', '', 3);


#
# TABLE STRUCTURE FOR: web_setting
#

DROP TABLE IF EXISTS `web_setting`;

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `currency_position` varchar(10) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `rtr` varchar(255) DEFAULT NULL,
  `captcha` int(11) DEFAULT 1 COMMENT '0=active,1=inactive',
  `site_key` varchar(250) DEFAULT NULL,
  `secret_key` varchar(250) DEFAULT NULL,
  `discount_type` int(11) DEFAULT 1,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `web_setting` (`setting_id`, `logo`, `invoice_logo`, `favicon`, `currency`, `timezone`, `currency_position`, `footer_text`, `language`, `rtr`, `captcha`, `site_key`, `secret_key`, `discount_type`) VALUES (1, 'https://erp.gmebdonline.com/./my-assets/image/logo/8e58af86bc24f2ebf5fae4c24bb7860d.png', 'http://erp.devenport.co/./my-assets/image/logo/df40f631bb64182d87895c1eaf2f01ea.png', 'http://erp.devenport.co/my-assets/image/logo/5e40b3bddb804d7e975dd522dd1af73f.png', 'Tk', 'Asia/Dhaka', '0', 'Copyright© 2020-GMELBD', 'english', '0', 1, '', '', 1);



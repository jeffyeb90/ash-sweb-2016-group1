-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2016 at 12:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ppdu`
--

-- --------------------------------------------------------

--
-- Table structure for table `AgendaAttachments`
--

CREATE TABLE IF NOT EXISTS `AgendaAttachments` (
  `AgendaAttachmentID` int(11) NOT NULL AUTO_INCREMENT,
  `AgendaID` int(11) NOT NULL,
  `AttachmentDescription` varchar(255) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`AgendaAttachmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `AgendaItems`
--

CREATE TABLE IF NOT EXISTS `AgendaItems` (
  `AgendaItemId` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `RaisedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`AgendaItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Agendas`
--

CREATE TABLE IF NOT EXISTS `Agendas` (
  `AgendaID` int(11) NOT NULL AUTO_INCREMENT,
  `ProposedMeetingDate` decimal(10,0) NOT NULL,
  `MeetingID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`AgendaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `AllowedUsers`
--

CREATE TABLE IF NOT EXISTS `AllowedUsers` (
  `WorkflowStateID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ApprovalDecisionLetters`
--

CREATE TABLE IF NOT EXISTS `ApprovalDecisionLetters` (
  `ApprovalDecisionLetterID` int(11) NOT NULL AUTO_INCREMENT,
  `MemoID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `DecisionStatusID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`ApprovalDecisionLetterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ApprovalMemos`
--

CREATE TABLE IF NOT EXISTS `ApprovalMemos` (
  `ApprovalMemoID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  PRIMARY KEY (`ApprovalMemoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CommitteeReports`
--

CREATE TABLE IF NOT EXISTS `CommitteeReports` (
  `CommitteeReportID` int(11) NOT NULL AUTO_INCREMENT,
  `MemoID` int(11) NOT NULL,
  `MeetingID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `RecommendationStatusID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`CommitteeReportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Contractors`
--

CREATE TABLE IF NOT EXISTS `Contractors` (
  `ContractorID` int(11) NOT NULL AUTO_INCREMENT,
  `Contractor` varchar(30) NOT NULL,
  PRIMARY KEY (`ContractorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DecisionLetters`
--

CREATE TABLE IF NOT EXISTS `DecisionLetters` (
  `DecisionLetterID` int(11) NOT NULL AUTO_INCREMENT,
  `MemoID` int(11) NOT NULL,
  `MeetingID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `DecisionStatusID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`DecisionLetterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Decisions`
--

CREATE TABLE IF NOT EXISTS `Decisions` (
  `DecisionID` int(11) NOT NULL AUTO_INCREMENT,
  `DecisionDate` date NOT NULL,
  `MeetingID` int(11) NOT NULL,
  `MeetingNumber` varchar(50) NOT NULL,
  `MeetingDate` date NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `DecisionStatusID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`DecisionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DecisionStatus`
--

CREATE TABLE IF NOT EXISTS `DecisionStatus` (
  `DecisionStatusID` int(11) NOT NULL AUTO_INCREMENT,
  `DecisionStatus` varchar(30) NOT NULL,
  PRIMARY KEY (`DecisionStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Districts`
--

CREATE TABLE IF NOT EXISTS `Districts` (
  `DistrictID` int(11) NOT NULL AUTO_INCREMENT,
  `District` varchar(30) NOT NULL,
  PRIMARY KEY (`DistrictID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Documents`
--

CREATE TABLE IF NOT EXISTS `Documents` (
  `DocumentID` int(11) NOT NULL AUTO_INCREMENT,
  `DocumentTitle` varchar(255) NOT NULL,
  `ReferenceNo` varchar(255) NOT NULL,
  `DocumentDate` date NOT NULL,
  `Keywords` varchar(400) NOT NULL,
  `FilePath` varchar(255) NOT NULL,
  `DocumentTypeID` int(11) NOT NULL,
  `UploadDate` date NOT NULL,
  PRIMARY KEY (`DocumentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DocumentStateHistory`
--

CREATE TABLE IF NOT EXISTS `DocumentStateHistory` (
  `DocumentStateHistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `DocumentID` int(11) NOT NULL,
  `WorkflowStateID` int(11) NOT NULL,
  `CreatedDate` date NOT NULL,
  `SenderID` int(11) NOT NULL,
  `RecipientID` int(11) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  PRIMARY KEY (`DocumentStateHistoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DocumentTypes`
--

CREATE TABLE IF NOT EXISTS `DocumentTypes` (
  `DocumentTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `DocumentType` varchar(30) NOT NULL,
  `TableName` varchar(30) NOT NULL,
  PRIMARY KEY (`DocumentTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ExecutiveApprovalMemo`
--

CREATE TABLE IF NOT EXISTS `ExecutiveApprovalMemo` (
  `ExecutiveApprovalMemoID` int(11) NOT NULL AUTO_INCREMENT,
  `MinistryID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`ExecutiveApprovalMemoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ForwardingLetters`
--

CREATE TABLE IF NOT EXISTS `ForwardingLetters` (
  `ForwardingLetterID` int(11) NOT NULL AUTO_INCREMENT,
  `MemoID` int(11) NOT NULL,
  `MinistryID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`ForwardingLetterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `FundingSources`
--

CREATE TABLE IF NOT EXISTS `FundingSources` (
  `FundingSourceID` int(11) NOT NULL AUTO_INCREMENT,
  `FundingSource` varchar(30) NOT NULL,
  PRIMARY KEY (`FundingSourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `MeetingParticipants`
--

CREATE TABLE IF NOT EXISTS `MeetingParticipants` (
  `MeetingParticipantsID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`MeetingParticipantsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Meetings`
--

CREATE TABLE IF NOT EXISTS `Meetings` (
  `MeetingID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingNumber` varchar(50) NOT NULL,
  `ProposedMeetingDate` date NOT NULL,
  `WasPostponed` tinyint(4) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`MeetingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `MeetingTypes`
--

CREATE TABLE IF NOT EXISTS `MeetingTypes` (
  `MeetingTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingType` varchar(30) NOT NULL,
  PRIMARY KEY (`MeetingTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Memos`
--

CREATE TABLE IF NOT EXISTS `Memos` (
  `MemoID` int(11) NOT NULL AUTO_INCREMENT,
  `MinistryID` int(11) NOT NULL,
  `IsSigned` tinyint(4) NOT NULL,
  `HasTitle` tinyint(11) NOT NULL,
  `HasSummary` tinyint(11) NOT NULL,
  `PriorityID` int(11) NOT NULL,
  `SourceID` int(11) NOT NULL,
  `MemoContent` varchar(2000) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`MemoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Minutes`
--

CREATE TABLE IF NOT EXISTS `Minutes` (
  `MinutesID` int(11) NOT NULL AUTO_INCREMENT,
  `MeetingID` int(11) NOT NULL,
  `ActualMeetingDate` date NOT NULL,
  `MeetingTypeID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`MinutesID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Priorities`
--

CREATE TABLE IF NOT EXISTS `Priorities` (
  `PriorityID` int(11) NOT NULL AUTO_INCREMENT,
  `PriorityName` varchar(50) NOT NULL,
  PRIMARY KEY (`PriorityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectReports`
--

CREATE TABLE IF NOT EXISTS `ProjectReports` (
  `ProjectReportID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL,
  PRIMARY KEY (`ProjectReportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE IF NOT EXISTS `Projects` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(255) NOT NULL,
  `RegionID` int(11) NOT NULL,
  `DistrictID` int(11) NOT NULL,
  `Locality` varchar(100) NOT NULL,
  `ContractorID` int(11) NOT NULL,
  `ContractAmount` decimal(14,2) NOT NULL,
  `PercentageDone` int(11) NOT NULL,
  `ExpectedPercentage` int(11) NOT NULL,
  `FundingSourceID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `MDAID` int(11) NOT NULL,
  `ProjectCreationDate` date NOT NULL,
  `SourceID` int(11) NOT NULL,
  `PriorityID` int(11) NOT NULL,
  `DecisionMemoDate` int(11) NOT NULL,
  `MinistryContact` int(11) NOT NULL,
  `ProjectTypeID` int(11) NOT NULL,
  `Verification` int(11) NOT NULL,
  `DocumentID` int(11) NOT NULL COMMENT 'Perhaps memo approving project',
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectStatus`
--

CREATE TABLE IF NOT EXISTS `ProjectStatus` (
  `ProjectStatusID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectStatus` varchar(30) NOT NULL,
  PRIMARY KEY (`ProjectStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectTypes`
--

CREATE TABLE IF NOT EXISTS `ProjectTypes` (
  `ProjectTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectType` varchar(30) NOT NULL,
  PRIMARY KEY (`ProjectTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `RecommendationStatus`
--

CREATE TABLE IF NOT EXISTS `RecommendationStatus` (
  `RecommendationStatusID` int(11) NOT NULL AUTO_INCREMENT,
  `RecommendationStatus` varchar(30) NOT NULL,
  PRIMARY KEY (`RecommendationStatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Regions`
--

CREATE TABLE IF NOT EXISTS `Regions` (
  `RegionID` int(11) NOT NULL AUTO_INCREMENT,
  `Region` varchar(30) NOT NULL,
  PRIMARY KEY (`RegionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Sources`
--

CREATE TABLE IF NOT EXISTS `Sources` (
  `SourceID` int(11) NOT NULL AUTO_INCREMENT,
  `Source` varchar(30) NOT NULL,
  PRIMARY KEY (`SourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `UserLevels`
--

CREATE TABLE IF NOT EXISTS `UserLevels` (
  `UserLevelID` int(11) NOT NULL AUTO_INCREMENT,
  `UserLevel` varchar(30) NOT NULL,
  PRIMARY KEY (`UserLevelID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `UserLevelID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNo` varchar(14) NOT NULL,
  `CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `WorkflowNavigation`
--

CREATE TABLE IF NOT EXISTS `WorkflowNavigation` (
  `WorkflowNavigationID` int(11) NOT NULL AUTO_INCREMENT,
  `WorkflowStateID` int(11) NOT NULL,
  `NextWorkflowStateID` int(11) NOT NULL,
  PRIMARY KEY (`WorkflowNavigationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Workflows`
--

CREATE TABLE IF NOT EXISTS `Workflows` (
  `WorkflowID` int(11) NOT NULL AUTO_INCREMENT,
  `WorkflowName` varchar(50) NOT NULL,
  PRIMARY KEY (`WorkflowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `WorkflowStates`
--

CREATE TABLE IF NOT EXISTS `WorkflowStates` (
  `WorkflowStateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(50) NOT NULL,
  `WorkflowID` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`WorkflowStateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

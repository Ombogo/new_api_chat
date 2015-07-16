<!-- Begin Main Menu -->
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(6, "mmi_CustomView1", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("6", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "CustomView1rpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(7, "mmi_CustomView1_Chart1", $ReportLanguage->Phrase("ChartReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("7", "MenuText") . $ReportLanguage->Phrase("ChartReportMenuItemSuffix"), "CustomView1rpt.php#cht_CustomView1_Chart1", 6, "", TRUE, FALSE);
$RootMenu->AddMenuItem(2, "mmi_messages", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("2", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "messagesrpt.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(3, "mmi_status", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("3", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "statusrpt.php", -1, "", TRUE, FALSE);
$RootMenu->Render();
?>
<!-- End Main Menu -->

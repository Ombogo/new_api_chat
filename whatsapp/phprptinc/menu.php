<!-- Begin Main Menu -->
<div class="ewMenu">
<?php $RootMenu = new crMenu(EWR_MENUBAR_ID); ?>
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(5, "mi_view1_Chart1", $ReportLanguage->Phrase("ChartReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("5", "MenuText") . $ReportLanguage->Phrase("ChartReportMenuItemSuffix"), "view1rpt.php#cht_view1_Chart1", 4, "", TRUE, FALSE);
$RootMenu->AddMenuItem(2, "mi_messages", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("2", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "messageslist.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(3, "mi_status", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("3", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "statuslist.php", -1, "", TRUE, FALSE);
$RootMenu->AddMenuItem(4, "mi_view1", $ReportLanguage->Phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("4", "MenuText") . $ReportLanguage->Phrase("SimpleReportMenuItemSuffix"), "view1rpt.php", -1, "", TRUE, FALSE);


$RootMenu->Render();
?>
</div>
<!-- End Main Menu -->

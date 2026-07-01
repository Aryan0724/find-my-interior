<?php
$data = json_decode(file_get_contents(__DIR__ . '/schema_output_2.json'), true);

$report = "# Database Truth Report\n\n";

$canonicalMap = [
    'requirements' => 'Canonical: Marketplace Opportunity',
    'projects' => 'Orphan/Deprecated (Future ProjectExecution)',
    'bids' => 'Canonical: Bid',
    'rfqs' => 'Canonical: RFQ',
    'worker_jobs' => 'Canonical: Worker Job',
    'conversations' => 'Canonical: Conversation',
    'listings' => 'Canonical: Listing',
    'wallets' => 'Canonical: Wallet',
    'user_subscriptions' => 'Canonical: Subscription',
    'user_documents' => 'Canonical: Verification',
    'roles' => 'Canonical: User Role',
    'users' => 'Canonical: User'
];

foreach ($data as $table => $info) {
    if (in_array($table, ['cache', 'jobs', 'migrations', 'personal_access_tokens', 'sqlite_sequence'])) continue;
    $report .= "## Table: `$table`\n";
    $report .= "**Status:** " . ($canonicalMap[$table] ?? 'Supporting/Non-canonical') . "\n";
    
    $cols = [];
    foreach ($info['columns'] as $c) {
        $cols[] = "{$c['name']} ({$c['type_name']})";
    }
    $report .= "**Columns:** " . implode(', ', $cols) . "\n\n";
}

echo $report;

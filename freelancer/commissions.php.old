<?php
$page_id = 'commissions';
$pageTitle = 'Commission Tracking - SITUNEO DIGITAL';
$pageDescription = 'Track your commissions and earnings';
$pageHeading = 'Commission Tracking';

include __DIR__ . '/../includes/freelancer-header.php';

$filter_status = isset($_GET['status']) ? $_GET['status'] : 'all';

// Demo data for commissions
if (DEMO_MODE) {
    $commissions = [
        [
            'commission_id' => 'COM-2025-012',
            'order_id' => 'ORD-2025-008',
            'client' => 'David Lee',
            'service' => 'E-Commerce Website',
            'order_amount' => 5500000,
            'commission_rate' => 40,
            'commission_amount' => 2200000,
            'tier' => 2, // PRO
            'status' => 'paid',
            'completed_date' => '2025-01-18 16:00:00',
            'paid_date' => '2025-01-19 10:00:00',
        ],
        [
            'commission_id' => 'COM-2025-008',
            'order_id' => 'ORD-2025-003',
            'client' => 'Sarah Wilson',
            'service' => 'Mobile App UI Design',
            'order_amount' => 4000000,
            'commission_rate' => 40,
            'commission_amount' => 1600000,
            'tier' => 2, // PRO
            'status' => 'paid',
            'completed_date' => '2025-01-14 15:00:00',
            'paid_date' => '2025-01-15 09:00:00',
        ],
        [
            'commission_id' => 'COM-2025-006',
            'order_id' => 'ORD-2024-195',
            'client' => 'Emma Johnson',
            'service' => 'Logo Design',
            'order_amount' => 800000,
            'commission_rate' => 40,
            'commission_amount' => 320000,
            'tier' => 2, // PRO
            'status' => 'paid',
            'completed_date' => '2025-01-10 14:00:00',
            'paid_date' => '2025-01-11 10:00:00',
        ],
        [
            'commission_id' => 'COM-2024-092',
            'order_id' => 'ORD-2024-180',
            'client' => 'Mike Brown',
            'service' => 'SEO Optimization',
            'order_amount' => 500000,
            'commission_rate' => 30,
            'commission_amount' => 150000,
            'tier' => 1, // STARTER
            'status' => 'paid',
            'completed_date' => '2024-12-28 11:00:00',
            'paid_date' => '2024-12-29 10:00:00',
        ],
        [
            'commission_id' => 'COM-2024-088',
            'order_id' => 'ORD-2024-175',
            'client' => 'Lisa Anderson',
            'service' => 'Landing Page',
            'order_amount' => 1200000,
            'commission_rate' => 30,
            'commission_amount' => 360000,
            'tier' => 1, // STARTER
            'status' => 'paid',
            'completed_date' => '2024-12-20 16:00:00',
            'paid_date' => '2024-12-21 09:00:00',
        ],
        [
            'commission_id' => 'COM-2025-015',
            'order_id' => 'ORD-2025-012',
            'client' => 'Jane Smith',
            'service' => 'Landing Page Design',
            'order_amount' => 800000,
            'commission_rate' => 40,
            'commission_amount' => 320000,
            'tier' => 2, // PRO
            'status' => 'pending',
            'completed_date' => null,
            'paid_date' => null,
        ],
        [
            'commission_id' => 'COM-2025-018',
            'order_id' => 'ORD-2025-001',
            'client' => 'John Doe',
            'service' => 'Company Profile Website',
            'order_amount' => 1500000,
            'commission_rate' => 40,
            'commission_amount' => 600000,
            'tier' => 2, // PRO
            'status' => 'pending',
            'completed_date' => null,
            'paid_date' => null,
        ],
    ];

    // Filter commissions
    if ($filter_status !== 'all') {
        $commissions = array_filter($commissions, function($com) use ($filter_status) {
            return $com['status'] === $filter_status;
        });
    }
}

// Stats
$total = count($commissions);
$pending_count = count(array_filter($commissions, fn($c) => $c['status'] === 'pending'));
$paid_count = count(array_filter($commissions, fn($c) => $c['status'] === 'paid'));

$pending_amount = array_sum(array_map(fn($c) => $c['status'] === 'pending' ? $c['commission_amount'] : 0, $commissions));
$paid_amount = array_sum(array_map(fn($c) => $c['status'] === 'paid' ? $c['commission_amount'] : 0, $commissions));
$this_month = array_sum(array_map(fn($c) => (date('Y-m', strtotime($c['paid_date'] ?? '2000-01-01')) === date('Y-m')) ? $c['commission_amount'] : 0, $commissions));

?>

<!-- Tier Info Banner -->
<div class="card-premium mb-4" style="background: linear-gradient(135deg, #0dcaf0 0%, #0a8fb8 100%); color: white;">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-2">
                <i class="bi bi-trophy-fill me-2"></i>
                Current Tier: PRO
            </h5>
            <p class="mb-0">Your commission rate: <strong>40%</strong> on all completed projects</p>
        </div>
        <div class="text-end">
            <div class="badge bg-white text-dark px-3 py-2 fs-5">40%</div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">Pending Commissions</h6>
            <h4 class="text-warning mb-1"><?= formatRupiah($pending_amount) ?></h4>
            <small class="text-muted"><?= $pending_count ?> projects</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">Paid Commissions</h6>
            <h4 class="text-success mb-1"><?= formatRupiah($paid_amount) ?></h4>
            <small class="text-muted"><?= $paid_count ?> projects</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">This Month</h6>
            <h4 class="text-info mb-1"><?= formatRupiah($this_month) ?></h4>
            <small class="text-muted">January 2025</small>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">Available to Withdraw</h6>
            <h4 class="text-gold mb-1"><?= formatRupiah($paid_amount - 2500000) ?></h4>
            <small class="text-muted">After pending withdrawals</small>
        </div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="card-premium mb-4">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'all' ? 'active' : '' ?>" href="?status=all">
                All (<?= $total ?>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'pending' ? 'active' : '' ?>" href="?status=pending">
                Pending (<?= $pending_count ?>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'paid' ? 'active' : '' ?>" href="?status=paid">
                Paid (<?= $paid_count ?>)
            </a>
        </li>
    </ul>
</div>

<!-- Commissions Table -->
<div class="card-premium">
    <h5 class="text-gold mb-4">
        <i class="bi bi-list-ul me-2"></i>
        Commission History
    </h5>

    <?php if (empty($commissions)): ?>
    <div class="text-center py-5">
        <i class="bi bi-inbox display-4 text-muted mb-3"></i>
        <p class="text-light">No commissions found</p>
    </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Commission ID</th>
                    <th>Order ID</th>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Order Amount</th>
                    <th>Rate</th>
                    <th>Commission</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commissions as $commission): ?>
                <tr>
                    <td><code class="text-gold"><?= $commission['commission_id'] ?></code></td>
                    <td><code class="text-muted"><?= $commission['order_id'] ?></code></td>
                    <td class="text-light"><?= htmlspecialchars($commission['client']) ?></td>
                    <td class="text-light"><?= htmlspecialchars($commission['service']) ?></td>
                    <td class="text-light"><?= formatRupiah($commission['order_amount']) ?></td>
                    <td>
                        <?php
                        $tier_badge = match($commission['tier']) {
                            1 => '<span class="badge bg-secondary">30%</span>',
                            2 => '<span class="badge bg-info">40%</span>',
                            3 => '<span class="badge bg-success">50%</span>',
                            default => '<span class="badge bg-secondary">-</span>'
                        };
                        echo $tier_badge;
                        ?>
                    </td>
                    <td class="text-gold fw-bold"><?= formatRupiah($commission['commission_amount']) ?></td>
                    <td>
                        <?php if ($commission['status'] === 'paid'): ?>
                        <span class="badge bg-success">Paid</span>
                        <?php else: ?>
                        <span class="badge bg-warning">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-muted small">
                        <?php if ($commission['paid_date']): ?>
                        <?= date('d M Y', strtotime($commission['paid_date'])) ?>
                        <?php else: ?>
                        -
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="table-gold">
                    <th colspan="6" class="text-end">TOTAL:</th>
                    <th>
                        <?php
                        $total_commission = array_sum(array_map(fn($c) => $c['commission_amount'], $commissions));
                        echo formatRupiah($total_commission);
                        ?>
                    </th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php endif; ?>
</div>

<!-- Monthly Breakdown -->
<div class="card-premium mt-4">
    <h5 class="text-gold mb-4">
        <i class="bi bi-calendar3 me-2"></i>
        Monthly Breakdown
    </h5>

    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Projects</th>
                    <th>Avg Rate</th>
                    <th>Total Earned</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-light">January 2025</td>
                    <td class="text-light">5 projects</td>
                    <td><span class="badge bg-info">40%</span></td>
                    <td class="text-gold fw-bold"><?= formatRupiah($this_month) ?></td>
                </tr>
                <tr>
                    <td class="text-light">December 2024</td>
                    <td class="text-light">2 projects</td>
                    <td><span class="badge bg-secondary">30%</span></td>
                    <td class="text-gold fw-bold">Rp 510.000</td>
                </tr>
                <tr>
                    <td class="text-light">November 2024</td>
                    <td class="text-light">3 projects</td>
                    <td><span class="badge bg-secondary">30%</span></td>
                    <td class="text-gold fw-bold">Rp 900.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Tier Breakdown -->
<div class="card-premium mt-4">
    <h5 class="text-gold mb-4">
        <i class="bi bi-pie-chart me-2"></i>
        Earnings by Tier
    </h5>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card bg-secondary bg-opacity-25 p-3 text-center">
                <i class="bi bi-trophy text-secondary fs-1 mb-2"></i>
                <h6 class="text-light">STARTER Tier (30%)</h6>
                <h4 class="text-gold mb-0">Rp 510.000</h4>
                <small class="text-muted">2 projects completed</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info bg-opacity-25 p-3 text-center">
                <i class="bi bi-trophy-fill text-info fs-1 mb-2"></i>
                <h6 class="text-light">PRO Tier (40%)</h6>
                <h4 class="text-gold mb-0"><?= formatRupiah($this_month) ?></h4>
                <small class="text-muted">5 projects completed</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success bg-opacity-25 p-3 text-center">
                <i class="bi bi-trophy-fill text-success fs-1 mb-2"></i>
                <h6 class="text-light">EXPERT Tier (50%)</h6>
                <h4 class="text-gold mb-0">Rp 0</h4>
                <small class="text-muted">0 projects completed</small>
                <div class="mt-2">
                    <small class="text-warning">Complete 35 more orders to unlock!</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card-premium mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h6 class="text-gold mb-2">Ready to withdraw your earnings?</h6>
            <p class="text-muted mb-0">You have <?= formatRupiah($paid_amount - 2500000) ?> available for withdrawal</p>
        </div>
        <a href="/freelancer/withdrawals" class="btn btn-gold">
            <i class="bi bi-cash-coin me-2"></i>
            Request Withdrawal
        </a>
    </div>
</div>

<style>
.nav-pills .nav-link {
    color: var(--gold);
    border: 1px solid transparent;
}

.nav-pills .nav-link:hover {
    background: rgba(255, 180, 0, 0.1);
    border-color: var(--gold);
}

.nav-pills .nav-link.active {
    background: var(--gradient-gold);
    color: var(--dark-blue);
    border-color: var(--gold);
}

.table-gold {
    background: var(--gradient-gold);
    color: var(--dark-blue);
}

.table-gold th {
    color: var(--dark-blue);
    font-weight: 700;
}
</style>

<?php include __DIR__ . '/../includes/admin-footer.php'; ?>

<?php
$page_id = 'dashboard';
$pageTitle = 'Freelancer Dashboard - SITUNEO DIGITAL';
$pageDescription = 'Manage your freelance projects and earnings';

include __DIR__ . '/../includes/freelancer-header.php';

$pageHeading = 'Welcome, ' . $current_user['full_name'] . '!';

// Demo data
$earnings = [
    'today' => 450000,
    'this_week' => 2100000,
    'this_month' => 5000000,
    'total' => 12500000,
];

$tier_info = [
    'current' => 2,
    'name' => 'PRO',
    'rate' => 40,
    'monthly_orders' => 15,
    'next_tier_orders' => 50,
    'progress' => 30, // 15/50 = 30%
];

$active_projects = [
    [
        'order_id' => 'ORD-2025-001',
        'client' => 'John Doe',
        'service' => 'Company Profile Website',
        'amount' => 1500000,
        'commission' => 600000, // 40%
        'progress' => 65,
        'deadline' => '2025-01-25',
        'status' => 'in-progress',
    ],
    [
        'order_id' => 'ORD-2025-012',
        'client' => 'Jane Smith',
        'service' => 'Landing Page Design',
        'amount' => 800000,
        'commission' => 320000, // 40%
        'progress' => 40,
        'deadline' => '2025-01-28',
        'status' => 'in-progress',
    ],
    [
        'order_id' => 'ORD-2025-015',
        'client' => 'ABC Company',
        'service' => 'SEO Optimization',
        'amount' => 500000,
        'commission' => 200000, // 40%
        'progress' => 20,
        'deadline' => '2025-02-05',
        'status' => 'in-progress',
    ],
];

$recent_payments = [
    ['order_id' => 'ORD-2025-008', 'service' => 'E-Commerce Website', 'amount' => 2200000, 'date' => '2025-01-12 14:00:00'],
    ['order_id' => 'ORD-2025-003', 'service' => 'Mobile App UI', 'amount' => 1600000, 'date' => '2025-01-10 16:30:00'],
    ['order_id' => 'ORD-2024-180', 'service' => 'Logo Design', 'amount' => 200000, 'date' => '2025-01-08 10:00:00'],
];

$performance_stats = [
    'projects_completed' => 28,
    'avg_rating' => 4.8,
    'on_time_delivery' => 96,
    'client_satisfaction' => 98,
];

?>

<!-- Welcome Banner -->
<div class="card-premium mb-4" style="background: var(--gradient-gold); color: var(--dark-blue);">
    <div class="row align-items-center">
        <div class="col-lg-8">
            <h3 class="mb-3">
                <i class="bi bi-trophy-fill me-2"></i>
                You're a PRO Freelancer!
            </h3>
            <p class="mb-3">
                You're earning <strong>40% commission</strong> on all projects. Complete <?= $tier_info['next_tier_orders'] - $tier_info['monthly_orders'] ?> more orders this month to reach EXPERT tier (50% commission)!
            </p>
            <div class="progress" style="height: 25px; background: rgba(15, 48, 87, 0.3);">
                <div class="progress-bar" style="width: <?= $tier_info['progress'] ?>%; background: var(--dark-blue);">
                    <?= $tier_info['monthly_orders'] ?> / <?= $tier_info['next_tier_orders'] ?> orders
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center">
            <i class="bi bi-trophy-fill" style="font-size: 6rem; opacity: 0.5;"></i>
        </div>
    </div>
</div>

<!-- Earnings Cards -->
<div class="row g-3 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon me-3 bg-info bg-opacity-25">
                    <i class="bi bi-calendar-day text-info"></i>
                </div>
                <div>
                    <div class="stat-label">Today</div>
                    <div class="stat-value"><?= formatRupiah($earnings['today']) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon me-3 bg-success bg-opacity-25">
                    <i class="bi bi-calendar-week text-success"></i>
                </div>
                <div>
                    <div class="stat-label">This Week</div>
                    <div class="stat-value"><?= formatRupiah($earnings['this_week']) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon me-3 bg-warning bg-opacity-25">
                    <i class="bi bi-calendar-month text-warning"></i>
                </div>
                <div>
                    <div class="stat-label">This Month</div>
                    <div class="stat-value"><?= formatRupiah($earnings['this_month']) ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="stat-icon me-3" style="background: var(--gradient-gold);">
                    <i class="bi bi-cash-stack" style="color: var(--dark-blue);"></i>
                </div>
                <div>
                    <div class="stat-label">Total Earnings</div>
                    <div class="stat-value"><?= formatRupiah($earnings['total']) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="row g-4">
    <!-- Left: Active Projects -->
    <div class="col-lg-8">
        <div class="card-premium mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="text-gold mb-0">
                    <i class="bi bi-kanban me-2"></i>
                    Active Projects (<?= count($active_projects) ?>)
                </h5>
                <a href="/freelancer/projects" class="btn btn-sm btn-outline-gold">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <?php if (empty($active_projects)): ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox display-4 text-muted mb-3"></i>
                <p class="text-light">No active projects</p>
                <small class="text-muted">New projects will appear here when assigned by admin</small>
            </div>
            <?php else: ?>
            <?php foreach ($active_projects as $project): ?>
            <div class="card bg-dark mb-3 p-3">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h6 class="text-light mb-1"><?= htmlspecialchars($project['service']) ?></h6>
                        <div class="d-flex gap-2 align-items-center">
                            <code class="text-muted small"><?= $project['order_id'] ?></code>
                            <span class="badge bg-info">In Progress</span>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="text-gold fw-bold"><?= formatRupiah($project['commission']) ?></div>
                        <small class="text-muted">Your commission (40%)</small>
                    </div>
                </div>

                <div class="mb-3">
                    <small class="text-muted">
                        <i class="bi bi-person me-1"></i>Client: <strong class="text-light"><?= $project['client'] ?></strong>
                        <span class="mx-2">|</span>
                        <i class="bi bi-calendar me-1"></i>Deadline: <strong class="text-light"><?= date('d M Y', strtotime($project['deadline'])) ?></strong>
                    </small>
                </div>

                <!-- Progress Bar -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <small class="text-light">Progress</small>
                        <small class="text-gold"><?= $project['progress'] ?>%</small>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-gold" style="width: <?= $project['progress'] ?>%"></div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-gold" onclick="updateProgress('<?= $project['order_id'] ?>')">
                        <i class="bi bi-arrow-up-circle me-1"></i>
                        Update Progress
                    </button>
                    <button class="btn btn-sm btn-outline-info" onclick="viewProject('<?= $project['order_id'] ?>')">
                        <i class="bi bi-eye me-1"></i>
                        Details
                    </button>
                    <button class="btn btn-sm btn-outline-success" onclick="contactClient('<?= $project['client'] ?>')">
                        <i class="bi bi-chat-dots me-1"></i>
                        Contact Client
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Recent Payments -->
        <div class="card-premium">
            <h5 class="text-gold mb-4">
                <i class="bi bi-cash-coin me-2"></i>
                Recent Payments
            </h5>

            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Service</th>
                            <th>Commission</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_payments as $payment): ?>
                        <tr>
                            <td><code><?= $payment['order_id'] ?></code></td>
                            <td class="text-light"><?= $payment['service'] ?></td>
                            <td class="text-gold fw-bold"><?= formatRupiah($payment['amount']) ?></td>
                            <td class="text-muted small"><?= timeAgo($payment['date']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <a href="/freelancer/commissions" class="text-gold">
                    View All Commissions <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Right: Sidebar -->
    <div class="col-lg-4">
        <!-- Performance Stats -->
        <div class="card-premium mb-4">
            <h6 class="text-gold mb-3">
                <i class="bi bi-graph-up me-2"></i>
                Performance Stats
            </h6>

            <div class="stat-item mb-3 pb-3 border-bottom border-gold border-opacity-25">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">Projects Completed</span>
                    <strong class="text-gold"><?= $performance_stats['projects_completed'] ?></strong>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-gold" style="width: 100%"></div>
                </div>
            </div>

            <div class="stat-item mb-3 pb-3 border-bottom border-gold border-opacity-25">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">Average Rating</span>
                    <strong class="text-warning">
                        <?= $performance_stats['avg_rating'] ?> <i class="bi bi-star-fill"></i>
                    </strong>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-warning" style="width: <?= ($performance_stats['avg_rating'] / 5) * 100 ?>%"></div>
                </div>
            </div>

            <div class="stat-item mb-3 pb-3 border-bottom border-gold border-opacity-25">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">On-Time Delivery</span>
                    <strong class="text-success"><?= $performance_stats['on_time_delivery'] ?>%</strong>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-success" style="width: <?= $performance_stats['on_time_delivery'] ?>%"></div>
                </div>
            </div>

            <div class="stat-item">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-light">Client Satisfaction</span>
                    <strong class="text-info"><?= $performance_stats['client_satisfaction'] ?>%</strong>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-info" style="width: <?= $performance_stats['client_satisfaction'] ?>%"></div>
                </div>
            </div>
        </div>

        <!-- Tier Benefits -->
        <div class="card-premium mb-4">
            <h6 class="text-gold mb-3">
                <i class="bi bi-trophy me-2"></i>
                Tier Benefits
            </h6>

            <div class="tier-list">
                <div class="tier-item mb-3 p-3" style="background: rgba(108, 117, 125, 0.2); border-left: 3px solid #6c757d;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong class="text-secondary">STARTER</strong>
                        <span class="badge bg-secondary">30%</span>
                    </div>
                    <small class="text-muted">0-10 orders/month</small>
                </div>

                <div class="tier-item mb-3 p-3" style="background: rgba(13, 202, 240, 0.2); border-left: 3px solid #0dcaf0;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong class="text-info">PRO</strong>
                        <span class="badge bg-info">40%</span>
                    </div>
                    <small class="text-light">10-50 orders/month</small>
                    <div class="mt-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i>
                        <small class="text-success">Your current tier</small>
                    </div>
                </div>

                <div class="tier-item p-3" style="background: rgba(25, 135, 84, 0.2); border-left: 3px solid #198754;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong class="text-success">EXPERT</strong>
                        <span class="badge bg-success">50% + Bonus</span>
                    </div>
                    <small class="text-muted">50+ orders/month</small>
                    <div class="mt-2">
                        <small class="text-warning">
                            <i class="bi bi-star me-1"></i>
                            +5% bonus on all orders!
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card-premium">
            <h6 class="text-gold mb-3">
                <i class="bi bi-lightning me-2"></i>
                Quick Actions
            </h6>

            <div class="d-grid gap-2">
                <a href="/freelancer/projects" class="btn btn-gold btn-sm">
                    <i class="bi bi-kanban me-2"></i>
                    View All Projects
                </a>
                <a href="/freelancer/withdrawals" class="btn btn-outline-success btn-sm">
                    <i class="bi bi-cash-coin me-2"></i>
                    Request Withdrawal
                </a>
                <a href="/freelancer/profile" class="btn btn-outline-info btn-sm">
                    <i class="bi bi-person me-2"></i>
                    Update Profile
                </a>
                <a href="https://wa.me/6283173868915?text=Hello%20SITUNEO" target="_blank" class="btn btn-outline-success btn-sm">
                    <i class="bi bi-whatsapp me-2"></i>
                    Contact Admin
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function updateProgress(orderId) {
    const progress = prompt('Enter progress percentage (0-100):');
    if (progress && progress >= 0 && progress <= 100) {
        alert(`Progress updated to ${progress}% for ${orderId}`);
        location.reload();
    }
}

function viewProject(orderId) {
    alert(`Opening project details for ${orderId}...`);
    window.location.href = `/freelancer/projects?id=${orderId}`;
}

function contactClient(clientName) {
    alert(`Opening chat with ${clientName}...`);
}
</script>

<style>
.stat-card {
    background: var(--gradient-primary);
    padding: 1.5rem;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 180, 0, 0.3);
}

.stat-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 1.5rem;
}

.stat-value {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gold);
}

.stat-label {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
}

.tier-item {
    border-radius: 8px;
    transition: all 0.3s ease;
}

.tier-item:hover {
    transform: translateX(5px);
}
</style>

<?php include __DIR__ . '/../includes/admin-footer.php'; ?>

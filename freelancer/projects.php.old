<?php
$page_id = 'projects';
$pageTitle = 'Assigned Projects - SITUNEO DIGITAL';
$pageDescription = 'Manage your assigned projects';
$pageHeading = 'Assigned Projects';

include __DIR__ . '/../includes/freelancer-header.php';

$filter_status = isset($_GET['status']) ? $_GET['status'] : 'all';

// Demo data for freelancer projects
if (DEMO_MODE) {
    $projects = [
        [
            'order_id' => 'ORD-2025-001',
            'client' => 'John Doe',
            'client_email' => 'john@example.com',
            'service' => 'Company Profile Website',
            'package' => 'BUSINESS',
            'amount' => 1500000,
            'commission' => 600000, // 40%
            'status' => 'in-progress',
            'progress' => 65,
            'deadline' => '2025-01-25',
            'assigned_at' => '2025-01-11 09:00:00',
            'started_at' => '2025-01-11 14:00:00',
            'description' => 'Website 8 halaman dengan design modern minimalist',
            'requirements' => '- Homepage dengan hero section\n- About page\n- Services page\n- Portfolio gallery\n- Contact form\n- Blog section\n- Domain + hosting setup',
            'demo_url' => null,
        ],
        [
            'order_id' => 'ORD-2025-012',
            'client' => 'Jane Smith',
            'client_email' => 'jane@example.com',
            'service' => 'Landing Page Design',
            'package' => 'STARTER',
            'amount' => 800000,
            'commission' => 320000, // 40%
            'status' => 'in-progress',
            'progress' => 40,
            'deadline' => '2025-01-28',
            'assigned_at' => '2025-01-13 10:00:00',
            'started_at' => '2025-01-13 11:00:00',
            'description' => 'Single page landing untuk campaign produk',
            'requirements' => '- Responsive design\n- Hero dengan CTA\n- Feature section\n- Testimonials\n- Contact form',
            'demo_url' => null,
        ],
        [
            'order_id' => 'ORD-2025-015',
            'client' => 'ABC Company',
            'client_email' => 'info@abc.com',
            'service' => 'SEO Optimization',
            'package' => null,
            'amount' => 500000,
            'commission' => 200000, // 40%
            'status' => 'in-progress',
            'progress' => 20,
            'deadline' => '2025-02-05',
            'assigned_at' => '2025-01-14 08:00:00',
            'started_at' => null,
            'description' => 'SEO On-Page untuk 10 halaman website',
            'requirements' => '- Keyword research\n- Meta tags optimization\n- Content optimization\n- Sitemap creation\n- Analytics setup',
            'demo_url' => null,
        ],
        [
            'order_id' => 'ORD-2025-008',
            'client' => 'David Lee',
            'client_email' => 'david@example.com',
            'service' => 'E-Commerce Website',
            'package' => 'E-COMMERCE',
            'amount' => 5500000,
            'commission' => 2200000, // 40%
            'status' => 'completed',
            'progress' => 100,
            'deadline' => '2025-01-20',
            'assigned_at' => '2025-01-05 09:00:00',
            'started_at' => '2025-01-05 10:00:00',
            'completed_at' => '2025-01-18 16:00:00',
            'description' => 'Toko online lengkap dengan payment gateway',
            'requirements' => '- Product catalog\n- Shopping cart\n- Checkout flow\n- Payment integration\n- Order management\n- Admin panel',
            'demo_url' => 'https://demo.example.com/shop',
        ],
        [
            'order_id' => 'ORD-2025-003',
            'client' => 'Sarah Wilson',
            'client_email' => 'sarah@example.com',
            'service' => 'Mobile App UI Design',
            'package' => 'PREMIUM',
            'amount' => 4000000,
            'commission' => 1600000, // 40%
            'status' => 'completed',
            'progress' => 100,
            'deadline' => '2025-01-15',
            'assigned_at' => '2025-01-03 09:00:00',
            'started_at' => '2025-01-03 10:00:00',
            'completed_at' => '2025-01-14 15:00:00',
            'description' => 'UI/UX design untuk mobile app (iOS & Android)',
            'requirements' => '- Wireframes\n- High-fidelity mockups\n- Prototype\n- Design system\n- Icon set',
            'demo_url' => 'https://www.figma.com/file/demo',
        ],
        [
            'order_id' => 'ORD-2025-020',
            'client' => 'Michael Brown',
            'client_email' => 'michael@example.com',
            'service' => 'Branding Package',
            'package' => 'BUSINESS',
            'amount' => 2000000,
            'commission' => 800000, // 40%
            'status' => 'pending',
            'progress' => 0,
            'deadline' => '2025-02-10',
            'assigned_at' => '2025-01-14 15:00:00',
            'started_at' => null,
            'description' => 'Complete branding: logo, color palette, typography',
            'requirements' => '- Logo design (3 concepts)\n- Color palette\n- Typography selection\n- Business card design\n- Social media templates\n- Brand guidelines',
            'demo_url' => null,
        ],
    ];

    // Filter projects
    if ($filter_status !== 'all') {
        $projects = array_filter($projects, function($proj) use ($filter_status) {
            return $proj['status'] === $filter_status;
        });
    }
}

// Stats
$all = count($projects);
$pending = count(array_filter($projects, fn($p) => $p['status'] === 'pending'));
$in_progress = count(array_filter($projects, fn($p) => $p['status'] === 'in-progress'));
$completed = count(array_filter($projects, fn($p) => $p['status'] === 'completed'));

?>

<!-- Stats Cards -->
<div class="row g-3 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">All Projects</h6>
            <h3 class="text-gold mb-0"><?= $all ?></h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">Pending</h6>
            <h3 class="text-warning mb-0"><?= $pending ?></h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">In Progress</h6>
            <h3 class="text-info mb-0"><?= $in_progress ?></h3>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card-premium">
            <h6 class="text-muted mb-2">Completed</h6>
            <h3 class="text-success mb-0"><?= $completed ?></h3>
        </div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="card-premium mb-4">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'all' ? 'active' : '' ?>" href="?status=all">
                All (<?= $all ?>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'pending' ? 'active' : '' ?>" href="?status=pending">
                Pending (<?= $pending ?>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'in-progress' ? 'active' : '' ?>" href="?status=in-progress">
                In Progress (<?= $in_progress ?>)
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $filter_status === 'completed' ? 'active' : '' ?>" href="?status=completed">
                Completed (<?= $completed ?>)
            </a>
        </li>
    </ul>
</div>

<!-- Projects List -->
<?php if (empty($projects)): ?>
<div class="card-premium text-center py-5">
    <i class="bi bi-inbox display-4 text-muted mb-3"></i>
    <h5 class="text-light mb-3">No projects found</h5>
    <p class="text-muted">New projects will appear here when assigned by admin</p>
</div>
<?php else: ?>

<?php foreach ($projects as $project): ?>
<div class="card-premium mb-4">
    <div class="row">
        <!-- Left: Project Info -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="text-gold mb-2">
                        <i class="bi bi-briefcase me-2"></i>
                        <?= htmlspecialchars($project['service']) ?>
                    </h4>
                    <div class="d-flex gap-2 flex-wrap align-items-center">
                        <code class="text-muted"><?= $project['order_id'] ?></code>
                        <?php if ($project['package']): ?>
                        <span class="badge badge-gold"><?= $project['package'] ?></span>
                        <?php endif; ?>
                        <?php
                        $status_badge = match($project['status']) {
                            'completed' => '<span class="badge bg-success">Completed</span>',
                            'in-progress' => '<span class="badge bg-info">In Progress</span>',
                            'pending' => '<span class="badge bg-warning">Pending</span>',
                            default => '<span class="badge bg-secondary">Unknown</span>'
                        };
                        echo $status_badge;
                        ?>
                    </div>
                </div>
            </div>

            <p class="text-light mb-3"><?= htmlspecialchars($project['description']) ?></p>

            <!-- Requirements -->
            <div class="card bg-dark p-3 mb-3">
                <h6 class="text-gold mb-2">
                    <i class="bi bi-list-check me-2"></i>
                    Requirements
                </h6>
                <pre class="text-light mb-0 small" style="white-space: pre-wrap;"><?= htmlspecialchars($project['requirements']) ?></pre>
            </div>

            <!-- Progress Bar -->
            <?php if ($project['status'] !== 'completed'): ?>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <small class="text-light"><i class="bi bi-graph-up me-1"></i>Progress</small>
                    <small class="text-gold fw-bold"><?= $project['progress'] ?>%</small>
                </div>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-gold" style="width: <?= $project['progress'] ?>%"></div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Details Grid -->
            <div class="row g-3">
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-person me-1"></i>Client
                    </small>
                    <p class="text-light mb-0 small"><?= htmlspecialchars($project['client']) ?></p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-cash me-1"></i>Your Commission
                    </small>
                    <p class="text-gold fw-bold mb-0 small"><?= formatRupiah($project['commission']) ?></p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-calendar me-1"></i>Deadline
                    </small>
                    <p class="<?= (strtotime($project['deadline']) < time()) && $project['status'] !== 'completed' ? 'text-danger' : 'text-light' ?> mb-0 small">
                        <?= date('d M Y', strtotime($project['deadline'])) ?>
                    </p>
                </div>
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-clock me-1"></i>Assigned
                    </small>
                    <p class="text-light mb-0 small"><?= timeAgo($project['assigned_at']) ?></p>
                </div>
                <?php if ($project['started_at']): ?>
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-play-circle me-1"></i>Started
                    </small>
                    <p class="text-light mb-0 small"><?= timeAgo($project['started_at']) ?></p>
                </div>
                <?php endif; ?>
                <?php if (isset($project['completed_at'])): ?>
                <div class="col-md-3">
                    <small class="text-muted d-block mb-1">
                        <i class="bi bi-check-circle me-1"></i>Completed
                    </small>
                    <p class="text-success mb-0 small"><?= timeAgo($project['completed_at']) ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Actions -->
        <div class="col-lg-4">
            <div class="card bg-dark p-3 h-100">
                <h6 class="text-gold mb-3">
                    <i class="bi bi-lightning me-2"></i>
                    Actions
                </h6>

                <div class="d-grid gap-2">
                    <?php if ($project['status'] === 'pending'): ?>
                    <button class="btn btn-gold" onclick="startProject('<?= $project['order_id'] ?>')">
                        <i class="bi bi-play-circle me-2"></i>
                        Start Working
                    </button>
                    <?php endif; ?>

                    <?php if ($project['status'] === 'in-progress'): ?>
                    <button class="btn btn-gold" onclick="updateProgress('<?= $project['order_id'] ?>', <?= $project['progress'] ?>)">
                        <i class="bi bi-arrow-up-circle me-2"></i>
                        Update Progress
                    </button>
                    <button class="btn btn-outline-info" onclick="uploadDemo('<?= $project['order_id'] ?>')">
                        <i class="bi bi-cloud-upload me-2"></i>
                        Upload Demo
                    </button>
                    <?php if ($project['progress'] >= 90): ?>
                    <button class="btn btn-success" onclick="markComplete('<?= $project['order_id'] ?>')">
                        <i class="bi bi-check-circle me-2"></i>
                        Mark as Complete
                    </button>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($project['demo_url']): ?>
                    <a href="<?= htmlspecialchars($project['demo_url']) ?>" target="_blank" class="btn btn-outline-gold">
                        <i class="bi bi-eye me-2"></i>
                        View Demo
                    </a>
                    <?php endif; ?>

                    <button class="btn btn-outline-success" onclick="contactClient('<?= $project['client'] ?>', '<?= $project['client_email'] ?>')">
                        <i class="bi bi-chat-dots me-2"></i>
                        Contact Client
                    </button>

                    <a href="https://wa.me/6283173868915?text=Project%20<?= $project['order_id'] ?>" target="_blank" class="btn btn-outline-success">
                        <i class="bi bi-whatsapp me-2"></i>
                        Contact Admin
                    </a>
                </div>

                <!-- Status Alert -->
                <?php if ($project['status'] === 'pending'): ?>
                <div class="alert alert-warning mt-3 mb-0 small">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Click "Start Working" to begin this project
                </div>
                <?php elseif ($project['status'] === 'in-progress'): ?>
                <div class="alert alert-info mt-3 mb-0 small">
                    <i class="bi bi-info-circle me-1"></i>
                    Keep the client updated on your progress
                </div>
                <?php elseif ($project['status'] === 'completed'): ?>
                <div class="alert alert-success mt-3 mb-0 small">
                    <i class="bi bi-check-circle me-1"></i>
                    Project completed! Payment will be processed.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php endif; ?>

<!-- Upload Demo Modal -->
<div class="modal fade" id="uploadDemoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header border-gold">
                <h5 class="modal-title text-gold">
                    <i class="bi bi-cloud-upload me-2"></i>
                    Upload Demo/Preview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="uploadDemoForm">
                    <input type="hidden" id="demoOrderId">

                    <div class="mb-3">
                        <label class="form-label text-light">Demo URL</label>
                        <input type="url" class="form-control" id="demoUrl" placeholder="https://demo.example.com">
                        <small class="text-muted">Link to live preview/demo</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Upload Files (Optional)</label>
                        <input type="file" class="form-control" id="demoFiles" multiple>
                        <small class="text-muted">Source files, screenshots, or documents</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light">Notes for Client</label>
                        <textarea class="form-control" id="demoNotes" rows="3" placeholder="Brief description of the demo..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-gold">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-gold" onclick="submitDemo()">
                    <i class="bi bi-upload me-2"></i>
                    Upload Demo
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let uploadDemoModal;

document.addEventListener('DOMContentLoaded', function() {
    uploadDemoModal = new bootstrap.Modal(document.getElementById('uploadDemoModal'));
});

function startProject(orderId) {
    if (confirm(`Start working on project ${orderId}?`)) {
        alert(`Project started! Status changed to "In Progress"`);
        location.reload();
    }
}

function updateProgress(orderId, currentProgress) {
    const newProgress = prompt(`Current progress: ${currentProgress}%\n\nEnter new progress (0-100):`, currentProgress);
    if (newProgress && newProgress >= 0 && newProgress <= 100) {
        alert(`Progress updated to ${newProgress}% for ${orderId}`);
        location.reload();
    }
}

function uploadDemo(orderId) {
    document.getElementById('demoOrderId').value = orderId;
    uploadDemoModal.show();
}

function submitDemo() {
    const url = document.getElementById('demoUrl').value;
    if (!url) {
        alert('Please enter demo URL');
        return;
    }

    alert('Demo uploaded successfully! Client will be notified.');
    uploadDemoModal.hide();
    location.reload();
}

function markComplete(orderId) {
    if (confirm(`Mark project ${orderId} as complete?\n\nMake sure you've uploaded the demo and final files.`)) {
        alert(`Project ${orderId} marked as complete! Commission will be added to your account.`);
        location.reload();
    }
}

function contactClient(clientName, clientEmail) {
    alert(`Contact ${clientName} via:\nEmail: ${clientEmail}\nOr use WhatsApp button below`);
}
</script>

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

pre {
    font-family: 'Inter', sans-serif;
    margin: 0;
}
</style>

<?php include __DIR__ . '/../includes/admin-footer.php'; ?>

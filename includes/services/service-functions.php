<?php
/**
 * ========================================
 * SITUNEO DIGITAL - Service Functions
 * Database queries for services, categories, packages, and search
 * ========================================
 */

if (!defined('BASE_PATH')) {
    die('Direct access not permitted');
}

/**
 * Get all service categories (active only)
 *
 * @param bool $activeOnly Filter active categories only
 * @return array List of categories
 */
function getServiceCategories($activeOnly = true) {
    global $db;

    $sql = "SELECT * FROM service_categories";
    if ($activeOnly) {
        $sql .= " WHERE is_active = 1";
    }
    $sql .= " ORDER BY order_position ASC, name ASC";

    return $db->fetchAll($sql);
}

/**
 * Get service category by ID or slug
 *
 * @param mixed $identifier Category ID or slug
 * @return array|null Category data
 */
function getServiceCategory($identifier) {
    global $db;

    if (is_numeric($identifier)) {
        $sql = "SELECT * FROM service_categories WHERE id = ?";
    } else {
        $sql = "SELECT * FROM service_categories WHERE slug = ?";
    }

    return $db->fetchOne($sql, [$identifier]);
}

/**
 * Get services by category
 *
 * @param int $categoryId Category ID
 * @param bool $activeOnly Filter active services only
 * @param int $limit Limit results
 * @return array List of services
 */
function getServicesByCategory($categoryId, $activeOnly = true, $limit = null) {
    global $db;

    $sql = "SELECT * FROM services WHERE category_id = ?";
    if ($activeOnly) {
        $sql .= " AND is_active = 1";
    }
    $sql .= " ORDER BY order_position ASC, name ASC";

    if ($limit) {
        $sql .= " LIMIT " . (int)$limit;
    }

    return $db->fetchAll($sql, [$categoryId]);
}

/**
 * Get service by ID or slug
 *
 * @param mixed $identifier Service ID or slug
 * @return array|null Service data
 */
function getService($identifier) {
    global $db;

    if (is_numeric($identifier)) {
        $sql = "SELECT s.*, sc.name as category_name, sc.slug as category_slug
                FROM services s
                LEFT JOIN service_categories sc ON s.category_id = sc.id
                WHERE s.id = ?";
    } else {
        $sql = "SELECT s.*, sc.name as category_name, sc.slug as category_slug
                FROM services s
                LEFT JOIN service_categories sc ON s.category_id = sc.id
                WHERE s.slug = ?";
    }

    return $db->fetchOne($sql, [$identifier]);
}

/**
 * Get all services with pagination
 *
 * @param array $filters Filter options (category, featured, active)
 * @param int $page Current page
 * @param int $perPage Items per page
 * @return array Services with pagination data
 */
function getServices($filters = [], $page = 1, $perPage = ITEMS_PER_PAGE) {
    global $db;

    $where = [];
    $params = [];

    if (isset($filters['category_id'])) {
        $where[] = "s.category_id = ?";
        $params[] = $filters['category_id'];
    }

    if (isset($filters['is_featured'])) {
        $where[] = "s.is_featured = ?";
        $params[] = $filters['is_featured'];
    }

    if (isset($filters['is_active']) || !isset($filters['is_active'])) {
        $where[] = "s.is_active = 1";
    }

    $whereClause = !empty($where) ? " WHERE " . implode(" AND ", $where) : "";

    // Count total
    $countSql = "SELECT COUNT(*) as total FROM services s" . $whereClause;
    $total = $db->fetchOne($countSql, $params)['total'];

    // Get data
    $offset = ($page - 1) * $perPage;
    $sql = "SELECT s.*, sc.name as category_name
            FROM services s
            LEFT JOIN service_categories sc ON s.category_id = sc.id"
            . $whereClause .
            " ORDER BY s.is_featured DESC, s.order_position ASC
            LIMIT $offset, $perPage";

    $data = $db->fetchAll($sql, $params);

    return [
        'data' => $data,
        'pagination' => getPagination($total, $page, $perPage)
    ];
}

/**
 * Get featured services
 *
 * @param int $limit Limit results
 * @return array Featured services
 */
function getFeaturedServices($limit = 6) {
    global $db;

    $sql = "SELECT s.*, sc.name as category_name
            FROM services s
            LEFT JOIN service_categories sc ON s.category_id = sc.id
            WHERE s.is_featured = 1 AND s.is_active = 1
            ORDER BY s.order_position ASC
            LIMIT ?";

    return $db->fetchAll($sql, [$limit]);
}

/**
 * Search services
 *
 * @param string $keyword Search keyword
 * @param array $filters Additional filters
 * @param int $page Current page
 * @param int $perPage Items per page
 * @return array Search results with pagination
 */
function searchServices($keyword, $filters = [], $page = 1, $perPage = ITEMS_PER_PAGE) {
    global $db;

    $where = ["s.is_active = 1"];
    $params = [];

    // Search in name, description, features
    if (!empty($keyword)) {
        $where[] = "(s.name LIKE ? OR s.description LIKE ? OR s.features LIKE ?)";
        $searchTerm = "%$keyword%";
        $params[] = $searchTerm;
        $params[] = $searchTerm;
        $params[] = $searchTerm;
    }

    if (isset($filters['category_id'])) {
        $where[] = "s.category_id = ?";
        $params[] = $filters['category_id'];
    }

    $whereClause = " WHERE " . implode(" AND ", $where);

    // Count total
    $countSql = "SELECT COUNT(*) as total FROM services s" . $whereClause;
    $total = $db->fetchOne($countSql, $params)['total'];

    // Get data
    $offset = ($page - 1) * $perPage;
    $sql = "SELECT s.*, sc.name as category_name
            FROM services s
            LEFT JOIN service_categories sc ON s.category_id = sc.id"
            . $whereClause .
            " ORDER BY s.is_featured DESC, s.name ASC
            LIMIT $offset, $perPage";

    $data = $db->fetchAll($sql, $params);

    return [
        'data' => $data,
        'pagination' => getPagination($total, $page, $perPage),
        'keyword' => $keyword
    ];
}

/**
 * Get service packages by service ID
 *
 * @param int $serviceId Service ID
 * @param bool $activeOnly Filter active packages only
 * @return array List of packages
 */
function getServicePackages($serviceId, $activeOnly = true) {
    global $db;

    $sql = "SELECT * FROM service_packages WHERE service_id = ?";
    if ($activeOnly) {
        $sql .= " AND is_active = 1";
    }
    $sql .= " ORDER BY order_position ASC, price ASC";

    return $db->fetchAll($sql, [$serviceId]);
}

/**
 * Get package by ID
 *
 * @param int $packageId Package ID
 * @return array|null Package data
 */
function getServicePackage($packageId) {
    global $db;

    $sql = "SELECT sp.*, s.name as service_name, s.slug as service_slug
            FROM service_packages sp
            LEFT JOIN services s ON sp.service_id = s.id
            WHERE sp.id = ?";

    return $db->fetchOne($sql, [$packageId]);
}

/**
 * Increment service view count
 *
 * @param int $serviceId Service ID
 * @return bool Success status
 */
function incrementServiceViews($serviceId) {
    global $db;

    $sql = "UPDATE services SET views_count = views_count + 1 WHERE id = ?";
    return $db->query($sql, [$serviceId]);
}

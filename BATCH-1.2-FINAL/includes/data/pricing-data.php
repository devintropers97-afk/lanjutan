<?php
/**
 * ================================================
 * SITUNEO DIGITAL - Pricing Packages Data
 * ================================================
 * Data paket bundling layanan
 */

$pricing_packages = [
    // PAKET STARTUP & USAHA KECIL
    [
        'id' => 1,
        'name' => 'Paket Startup Go Digital',
        'name_en' => 'Startup Go Digital Package',
        'category' => 'startup',
        'category_name' => 'Startup & UMKM',
        'category_name_en' => 'Startup & SME',
        'tagline' => 'Mulai bisnis digital Anda dengan budget terjangkau',
        'tagline_en' => 'Start your digital business with an affordable budget',
        'price' => 200000,
        'period' => 'monthly',
        'setup_fee' => 350000,
        'popular' => false,
        'features' => [
            'Website Landing Page (1 halaman)',
            'Domain .com (1 tahun)',
            'Hosting Basic + SSL',
            'SEO Dasar',
            'WhatsApp Integration',
            'Email Bisnis (1 akun)',
            'Maintenance bulanan',
            'Support via WhatsApp'
        ],
        'features_en' => [
            'Landing Page Website (1 page)',
            'Domain .com (1 year)',
            'Basic Hosting + SSL',
            'Basic SEO',
            'WhatsApp Integration',
            'Business Email (1 account)',
            'Monthly maintenance',
            'WhatsApp support'
        ],
        'best_for' => 'UMKM, freelancer, personal branding',
        'best_for_en' => 'SMEs, freelancers, personal branding'
    ],

    [
        'id' => 2,
        'name' => 'Paket Bisnis Naik Level',
        'name_en' => 'Business Level Up Package',
        'category' => 'business',
        'category_name' => 'Bisnis Berkembang',
        'category_name_en' => 'Growing Business',
        'tagline' => 'Tingkatkan bisnis Anda dengan digital marketing',
        'tagline_en' => 'Boost your business with digital marketing',
        'price' => 400000,
        'period' => 'monthly',
        'setup_fee' => 750000,
        'popular' => true,
        'features' => [
            'Website Multi-Page (4-6 halaman)',
            'Domain + Hosting + SSL',
            'SEO Optimasi (Basic)',
            'Copywriting (5 artikel/bulan)',
            'Meta Ads Management',
            'Email Bisnis (3 akun)',
            'Google Analytics Setup',
            'Laporan Bulanan',
            'Maintenance & Support'
        ],
        'features_en' => [
            'Multi-Page Website (4-6 pages)',
            'Domain + Hosting + SSL',
            'SEO Optimization (Basic)',
            'Copywriting (5 articles/month)',
            'Meta Ads Management',
            'Business Email (3 accounts)',
            'Google Analytics Setup',
            'Monthly Reports',
            'Maintenance & Support'
        ],
        'best_for' => 'Bisnis lokal, toko, klinik, restoran',
        'best_for_en' => 'Local businesses, stores, clinics, restaurants'
    ],

    [
        'id' => 3,
        'name' => 'Paket Pertumbuhan E-Commerce',
        'name_en' => 'E-Commerce Growth Package',
        'category' => 'ecommerce',
        'category_name' => 'E-Commerce',
        'category_name_en' => 'E-Commerce',
        'tagline' => 'Lengkap untuk bisnis online shop Anda',
        'tagline_en' => 'Complete solution for your online shop',
        'price' => 500000,
        'period' => 'monthly',
        'setup_fee' => 1500000,
        'popular' => true,
        'features' => [
            'Website Toko Online (E-Commerce)',
            'Katalog Produk Unlimited',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'SEO E-Commerce',
            'Meta Ads + Google Ads',
            '30 Deskripsi Produk/bulan',
            'Email Bisnis (5 akun)',
            'WhatsApp Blast',
            'Maintenance & Support Priority'
        ],
        'features_en' => [
            'E-Commerce Website',
            'Unlimited Product Catalog',
            'Payment Gateway Integration',
            'Domain + Cloud Hosting + SSL',
            'E-Commerce SEO',
            'Meta Ads + Google Ads',
            '30 Product Descriptions/month',
            'Business Email (5 accounts)',
            'WhatsApp Blast',
            'Priority Maintenance & Support'
        ],
        'best_for' => 'Online shop, toko retail, wholesaler',
        'best_for_en' => 'Online shops, retail stores, wholesalers'
    ],

    [
        'id' => 4,
        'name' => 'Paket Sistem AI Digital',
        'name_en' => 'Digital AI System Package',
        'category' => 'ai',
        'category_name' => 'Sistem Pintar',
        'category_name_en' => 'Smart System',
        'tagline' => 'Otomasi bisnis dengan kecerdasan buatan',
        'tagline_en' => 'Business automation with artificial intelligence',
        'price' => 600000,
        'period' => 'monthly',
        'setup_fee' => 2000000,
        'popular' => false,
        'features' => [
            'Website Custom + Dashboard',
            'Sistem CRM Custom',
            'Chatbot AI (WhatsApp/Website)',
            'Email Automation',
            'WhatsApp Blast Automation',
            'Domain + Cloud Hosting + SSL',
            'SEO Premium',
            'Marketing Reports AI',
            'Integration Support',
            'Priority Support 24/7'
        ],
        'features_en' => [
            'Custom Website + Dashboard',
            'Custom CRM System',
            'AI Chatbot (WhatsApp/Website)',
            'Email Automation',
            'WhatsApp Blast Automation',
            'Domain + Cloud Hosting + SSL',
            'Premium SEO',
            'AI Marketing Reports',
            'Integration Support',
            'Priority Support 24/7'
        ],
        'best_for' => 'Bisnis berkembang, startup teknologi, agensi',
        'best_for_en' => 'Growing businesses, tech startups, agencies'
    ],

    [
        'id' => 5,
        'name' => 'Paket Enterprise Premium',
        'name_en' => 'Premium Enterprise Package',
        'category' => 'enterprise',
        'category_name' => 'Enterprise',
        'category_name_en' => 'Enterprise',
        'tagline' => 'Solusi lengkap untuk perusahaan besar',
        'tagline_en' => 'Complete solution for large companies',
        'price' => 1500000,
        'period' => 'monthly',
        'setup_fee' => 5000000,
        'popular' => false,
        'features' => [
            'Website Enterprise + Portal',
            'Custom Web Application',
            'CRM + ERP Integration',
            'AI Chatbot Multi-Platform',
            'Cloud Infrastructure (AWS/GCP)',
            'SEO Premium + Content Strategy',
            'Full Digital Marketing (SEO, Ads, Social Media)',
            'Business Intelligence Dashboard',
            'API Integration Unlimited',
            'Email Bisnis Unlimited',
            'Security Monitoring 24/7',
            'Dedicated Account Manager',
            'Priority Support 24/7'
        ],
        'features_en' => [
            'Enterprise Website + Portal',
            'Custom Web Application',
            'CRM + ERP Integration',
            'Multi-Platform AI Chatbot',
            'Cloud Infrastructure (AWS/GCP)',
            'Premium SEO + Content Strategy',
            'Full Digital Marketing (SEO, Ads, Social Media)',
            'Business Intelligence Dashboard',
            'Unlimited API Integration',
            'Unlimited Business Email',
            'Security Monitoring 24/7',
            'Dedicated Account Manager',
            'Priority Support 24/7'
        ],
        'best_for' => 'Perusahaan besar, korporasi, enterprise',
        'best_for_en' => 'Large companies, corporations, enterprises'
    ],

    // PAKET KHUSUS INDUSTRI
    [
        'id' => 6,
        'name' => 'Paket Klinik & Rumah Sakit',
        'name_en' => 'Clinic & Hospital Package',
        'category' => 'industry',
        'category_name' => 'Industri Khusus',
        'category_name_en' => 'Special Industry',
        'tagline' => 'Solusi digital untuk layanan kesehatan',
        'tagline_en' => 'Digital solution for healthcare services',
        'price' => 700000,
        'period' => 'monthly',
        'setup_fee' => 1500000,
        'popular' => false,
        'features' => [
            'Website Klinik/RS',
            'Sistem Booking Appointment',
            'Jadwal Dokter Online',
            'Patient Portal',
            'WhatsApp Reminder Automation',
            'Domain + Hosting + SSL',
            'SEO Lokal (Google My Business)',
            'Content Marketing (Artikel Kesehatan)',
            'Email Bisnis',
            'Maintenance & Support'
        ],
        'features_en' => [
            'Clinic/Hospital Website',
            'Appointment Booking System',
            'Online Doctor Schedule',
            'Patient Portal',
            'WhatsApp Reminder Automation',
            'Domain + Hosting + SSL',
            'Local SEO (Google My Business)',
            'Content Marketing (Health Articles)',
            'Business Email',
            'Maintenance & Support'
        ],
        'best_for' => 'Klinik, rumah sakit, laboratorium, apotek',
        'best_for_en' => 'Clinics, hospitals, laboratories, pharmacies'
    ],

    [
        'id' => 7,
        'name' => 'Paket Sekolah & Pendidikan',
        'name_en' => 'School & Education Package',
        'category' => 'industry',
        'category_name' => 'Industri Khusus',
        'category_name_en' => 'Special Industry',
        'tagline' => 'Platform digital untuk lembaga pendidikan',
        'tagline_en' => 'Digital platform for educational institutions',
        'price' => 650000,
        'period' => 'monthly',
        'setup_fee' => 1200000,
        'popular' => false,
        'features' => [
            'Website Sekolah/Lembaga',
            'Portal Berita & Pengumuman',
            'Galeri Foto & Video',
            'Profil Pengajar',
            'Sistem Pendaftaran Online',
            'E-Learning Basic (Optional)',
            'Domain + Hosting + SSL',
            'SEO Lokal',
            'Social Media Management',
            'Email Bisnis (10 akun)',
            'Maintenance & Support'
        ],
        'features_en' => [
            'School/Institution Website',
            'News & Announcements Portal',
            'Photo & Video Gallery',
            'Teacher Profiles',
            'Online Registration System',
            'Basic E-Learning (Optional)',
            'Domain + Hosting + SSL',
            'Local SEO',
            'Social Media Management',
            'Business Email (10 accounts)',
            'Maintenance & Support'
        ],
        'best_for' => 'Sekolah, universitas, lembaga kursus, yayasan',
        'best_for_en' => 'Schools, universities, course institutions, foundations'
    ],

    [
        'id' => 8,
        'name' => 'Paket Properti & Real Estate',
        'name_en' => 'Property & Real Estate Package',
        'category' => 'industry',
        'category_name' => 'Industri Khusus',
        'category_name_en' => 'Special Industry',
        'tagline' => 'Maksimalkan penjualan properti Anda',
        'tagline_en' => 'Maximize your property sales',
        'price' => 800000,
        'period' => 'monthly',
        'setup_fee' => 1800000,
        'popular' => false,
        'features' => [
            'Website Property Listing',
            'Advanced Search & Filter',
            'Virtual Tour Integration',
            'Agent Dashboard',
            'Lead Management CRM',
            'Google Maps Integration',
            'Domain + Hosting + SSL',
            'SEO + Google Ads',
            'Facebook/Instagram Ads',
            'WhatsApp Automation',
            'Email Marketing',
            'Maintenance & Support'
        ],
        'features_en' => [
            'Property Listing Website',
            'Advanced Search & Filter',
            'Virtual Tour Integration',
            'Agent Dashboard',
            'Lead Management CRM',
            'Google Maps Integration',
            'Domain + Hosting + SSL',
            'SEO + Google Ads',
            'Facebook/Instagram Ads',
            'WhatsApp Automation',
            'Email Marketing',
            'Maintenance & Support'
        ],
        'best_for' => 'Developer properti, agen, broker, konsultan',
        'best_for_en' => 'Property developers, agents, brokers, consultants'
    ]
];

// Comparison Table Data
$comparison_features = [
    'Website' => [
        'startup' => '1 Halaman Landing Page',
        'business' => '4-6 Halaman Multi-Page',
        'ecommerce' => 'E-Commerce Full Features',
        'ai' => 'Custom Website + Dashboard',
        'enterprise' => 'Enterprise Portal + Custom App'
    ],
    'Domain & Hosting' => [
        'startup' => 'Domain .com + Basic Hosting',
        'business' => 'Domain + Hosting + SSL',
        'ecommerce' => 'Domain + Cloud Hosting + SSL',
        'ai' => 'Domain + Cloud Hosting + SSL',
        'enterprise' => 'Cloud Infrastructure (AWS/GCP)'
    ],
    'SEO' => [
        'startup' => 'SEO Dasar',
        'business' => 'SEO Basic',
        'ecommerce' => 'SEO E-Commerce',
        'ai' => 'SEO Premium',
        'enterprise' => 'SEO Premium + Content Strategy'
    ],
    'Digital Marketing' => [
        'startup' => '-',
        'business' => 'Meta Ads',
        'ecommerce' => 'Meta Ads + Google Ads',
        'ai' => 'Meta Ads + Google Ads + Social Media',
        'enterprise' => 'Full Digital Marketing'
    ],
    'AI & Automation' => [
        'startup' => '-',
        'business' => '-',
        'ecommerce' => 'WhatsApp Blast',
        'ai' => 'Chatbot AI + CRM + Automation',
        'enterprise' => 'Full AI System + Integration'
    ],
    'Content' => [
        'startup' => '-',
        'business' => '5 Artikel/bulan',
        'ecommerce' => '30 Deskripsi Produk/bulan',
        'ai' => 'Content + Marketing Reports',
        'enterprise' => 'Full Content Strategy'
    ],
    'Email Bisnis' => [
        'startup' => '1 Akun',
        'business' => '3 Akun',
        'ecommerce' => '5 Akun',
        'ai' => '10 Akun',
        'enterprise' => 'Unlimited'
    ],
    'Support' => [
        'startup' => 'WhatsApp Support',
        'business' => 'Email + WhatsApp',
        'ecommerce' => 'Priority Support',
        'ai' => 'Priority Support 24/7',
        'enterprise' => 'Dedicated Account Manager 24/7'
    ],
    'Maintenance' => [
        'startup' => 'Basic',
        'business' => 'Standard',
        'ecommerce' => 'Priority',
        'ai' => 'Premium',
        'enterprise' => 'Enterprise'
    ],
    'Reports' => [
        'startup' => '-',
        'business' => 'Laporan Bulanan',
        'ecommerce' => 'Laporan Detail Bulanan',
        'ai' => 'AI Marketing Reports',
        'enterprise' => 'BI Dashboard + Custom Reports'
    ]
];

?>

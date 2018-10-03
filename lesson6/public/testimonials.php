<?php
header('Content-type: text/html, charset=utf-8');

include __DIR__ . '/../config/mainConfig.php';
include ENGINES_DIR . 'dbEngine.php';
include ENGINES_DIR . 'testimonialsFunctions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    sendTestimonial($_POST['testimonial'], $_POST['name']);
}

$testimonials = getTestimonials();

include TEMPLATES_DIR . 'testimonialsTemplate.php';
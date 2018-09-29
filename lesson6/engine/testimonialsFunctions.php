<?php
function getTestimonials() {
    $sql = "SELECT * FROM testimonials ORDER BY id DESC ";
    $testimonials = returnQueryAll($sql);
    closeConnection();
    return $testimonials;
}

function sendTestimonial($testimonial, $name) {
    executeQuery("INSERT INTO testimonials (name, testimonial) VALUES ('{$name}', '{$testimonial}')");
}
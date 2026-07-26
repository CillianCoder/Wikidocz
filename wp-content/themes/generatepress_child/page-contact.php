<?php
/**
 * Template Name: Contact
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <section class="page-hero">
        <div class="wrap hero-grid">
            <div>
                <h1>Send a question, correction, or collaboration note</h1>
                <p>Have a question, correction, or collaboration idea? We'd love to hear from you.</p>
            </div>
            <aside class="panel">
                <h3>Response guide</h3>
                <ul class="note-list">
                    <li>General questions: usually within 2 to 5 business days.</li>
                    <li>Corrections: include the article URL and the exact issue.</li>
                    <li>Partnerships: include your website and proposal summary.</li>
                </ul>
            </aside>
        </div>
    </section>

    <section class="section">
        <div class="wrap contact-grid">
            <div class="form-panel">
                <form class="form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <label>
                        <span class="field-label">Name</span>
                        <input class="field" name="contact_name" placeholder="Your name" required>
                    </label>
                    <label>
                        <span class="field-label">Email</span>
                        <input class="field" name="contact_email" type="email" placeholder="you@example.com" required>
                    </label>
                    <label>
                        <span class="field-label">Subject</span>
                        <input class="field" name="contact_subject" placeholder="Correction, question, or partnership">
                    </label>
                    <label>
                        <span class="field-label">Message</span>
                        <textarea class="field textarea" name="contact_message" placeholder="Write your message" required></textarea>
                    </label>
                    <button class="button" type="submit">Send message</button>
                </form>
            </div>
            <div class="panel">
                <h2>Helpful links</h2>
                <p>For privacy questions, corrections, copyright concerns, or advertising inquiries, visit the relevant policy page.</p>
                <div class="filter-row">
                    <a class="tag outline contact-link" href="/privacy-policy">Privacy Policy</a>
                    <a class="tag outline contact-link" href="/terms">Terms</a>
                    <a class="tag outline contact-link" href="/disclaimer">Disclaimer</a>
                    <a class="tag outline contact-link" href="/editorial-policy">Editorial Policy</a>
                </div>
            </div>
        </div>
    </section>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>

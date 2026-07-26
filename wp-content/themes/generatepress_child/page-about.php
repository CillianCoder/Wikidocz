<?php
/**
 * Template Name: About
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<main id="main" class="category-v2">
    <?php do_action('generate_before_main_content'); ?>

    <section class="page-hero">
        <div class="wrap hero-grid">
            <div>
                <h1>Trusted knowledge for curious minds</h1>

            </div>
            <div class="visual light">Brand story image or editorial workspace visual</div>
        </div>
    </section>

    <section class="section">
        <div class="wrap about-grid">
            <div class="panel">
                <h2>Mission</h2>
                <p>Make useful knowledge easier to understand without making it shallow. Each article should help readers leave with a clearer idea than they arrived with.</p>
            </div>
            <div class="panel">
                <h2>Content promise</h2>
                <p>Wikidocz values clear structure, useful context, careful editing, and readable summaries. It should feel educational, not noisy.</p>
            </div>
        </div>
    </section>

    <section class="section white">
        <div class="wrap">
            <div class="section-head">
                <div>
                    <h2>Editorial principles</h2>
                </div>
            </div>
            <div class="grid">
                <article class="card">
                    <span class="tag discovery">Clear</span>
                    <h3>Simple language</h3>
                    <p>Explain difficult ideas with structure and examples.</p>
                </article>
                <article class="card">
                    <span class="tag curiosity">Useful</span>
                    <h3>Reader value first</h3>
                    <p>Every page should answer a question or improve understanding.</p>
                </article>
                <article class="card">
                    <span class="tag clarity">Careful</span>
                    <h3>Quality checks</h3>
                    <p>Review facts, update stale content, and correct mistakes transparently.</p>
                </article>
            </div>
        </div>
    </section>

    <?php do_action('generate_after_main_content'); ?>
</main>

<?php get_footer(); ?>

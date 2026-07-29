<?php
/**
 * Admin initialization: create pages & fill legal content.
 * Runs once via option checks.
 */
add_action( 'admin_init', 'wikidocz_create_pages' );
function wikidocz_create_pages() {
    if ( get_option( 'wikidocz_pages_created' ) ) {
        return;
    }
    $pages = array(
        'about'            => array( 'title' => 'About',           'template' => 'page-about.php' ),
        'contact'          => array( 'title' => 'Contact',         'template' => 'page-contact.php' ),
        'editorial-policy' => array( 'title' => 'Editorial Policy', 'template' => 'page-legal.php' ),
        'privacy-policy'   => array( 'title' => 'Privacy Policy',  'template' => 'page-legal.php' ),
        'terms'            => array( 'title' => 'Terms',           'template' => 'page-legal.php' ),
        'disclaimer'       => array( 'title' => 'Disclaimer',      'template' => 'page-legal.php' ),
    );
    foreach ( $pages as $slug => $data ) {
        $existing = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $existing ) {
            continue;
        }
        wp_insert_post( array(
            'post_title'    => $data['title'],
            'post_name'     => $slug,
            'post_type'     => 'page',
            'post_status'   => 'publish',
            'page_template' => $data['template'],
        ) );
    }
    update_option( 'wikidocz_pages_created', true );
}

add_action( 'admin_init', 'wikidocz_fill_legal_content' );
function wikidocz_fill_legal_content() {
    if ( get_option( 'wikidocz_legal_content_filled' ) ) {
        return;
    }
    $content = array(
        'privacy-policy' => array(
            'post_title'   => 'Privacy Policy',
            'post_content' => '<p>Wikidocz values your privacy. This policy explains what information we collect, why we collect it, and how we handle it when you visit our website or interact with our content.</p>

<h2>Information we collect</h2>
<p>We collect minimal information to operate and improve the site. This includes:</p>
<ul>
<li><strong>Usage data:</strong> pages visited, time spent, referring site, and browser type — collected through Google Analytics.</li>
<li><strong>Cookies:</strong> small files stored on your device to remember preferences, session information, and advertising preferences.</li>
<li><strong>Contact form data:</strong> name, email address, and message you voluntarily submit through our contact page.</li>
<li><strong>Newsletter data:</strong> email address if you subscribe to our mailing list.</li>
</ul>

<h2>How we use your information</h2>
<ul>
<li>Deliver and improve our content and reading experience.</li>
<li>Respond to questions, corrections, or partnership inquiries.</li>
<li>Send occasional newsletters if you have opted in.</li>
<li>Display relevant advertisements through third-party ad networks.</li>
</ul>

<h2>Cookies and similar technologies</h2>
<p>We use cookies for analytics, personalization, and advertising. Google and other third-party vendors may use cookies to serve ads based on your visits to Wikidocz and other websites. You can opt out of personalized advertising through <a href="https://adssettings.google.com">Google Ads Settings</a>.</p>

<h2>Third-party services</h2>
<p>We use the following third-party services, each with their own privacy policies:</p>
<ul>
<li>Google Analytics (usage tracking)</li>
<li>Google AdSense / ad networks (advertising)</li>
<li>Newsletter provider (email delivery)</li>
<li>Web hosting provider (server logs, IP addresses)</li>
</ul>

<h2>Data retention</h2>
<p>We retain contact form submissions for up to 12 months. Analytics data is retained as per Google Analytics retention settings. Newsletter subscriber data is retained until you unsubscribe.</p>

<h2>Your rights</h2>
<p>Depending on your location, you may have the right to access, correct, delete, or export your personal data. To exercise these rights, contact us through our contact page. We will respond within 30 days.</p>

<h2>Changes to this policy</h2>
<p>We may update this policy as needed. Changes will be posted on this page with an updated date.</p>',
        ),
        'terms' => array(
            'post_title'   => 'Terms',
            'post_content' => '<p>By accessing or using Wikidocz, you agree to be bound by these terms. If you do not agree, please discontinue use of the site.</p>

<h2>Use of content</h2>
<p>All articles, images, graphics, and other content on Wikidocz are for informational and educational purposes only. You may not reproduce, distribute, or republish our content without prior written permission, except for brief quotations with proper attribution.</p>

<h2>Intellectual property</h2>
<p>Unless otherwise noted, all content on Wikidocz is our original work or used with permission. Wikidocz name, logo, and design are our trademarks.</p>

<h2>User conduct</h2>
<p>You agree not to:</p>
<ul>
<li>Use the site for unlawful purposes</li>
<li>Attempt to disrupt or damage the site</li>
<li>Submit false or misleading information through forms</li>
<li>Scrape or extract content without authorization</li>
</ul>

<h2>External links</h2>
<p>Wikidocz contains links to third-party websites. We are not responsible for the content, privacy practices, or accuracy of external sites.</p>

<h2>Affiliate and advertising disclosure</h2>
<p>Some articles may contain affiliate links or sponsored content. Wikidocz may earn a commission from qualifying purchases at no additional cost to you. Sponsored content is clearly labeled. We maintain full editorial independence.</p>

<h2>Limitation of liability</h2>
<p>Wikidocz and its authors are not liable for any damages arising from the use or inability to use the site or its content. Content is provided "as is" without warranties of any kind.</p>

<h2>Changes to terms</h2>
<p>We reserve the right to modify these terms at any time. Continued use of the site after changes constitutes acceptance of the updated terms.</p>

<h2>Contact</h2>
<p>For questions about these terms, reach us through our contact page.</p>',
        ),
        'disclaimer' => array(
            'post_title'   => 'Disclaimer',
            'post_content' => '<p>The information provided on Wikidocz is for general informational and educational purposes only. While we strive for accuracy, we make no representations or warranties about the completeness, reliability, or suitability of the content.</p>

<h2>Not professional advice</h2>
<p>Content on Wikidocz should not be considered a substitute for professional advice. This includes, but is not limited to:</p>
<ul>
<li><strong>Medical advice:</strong> consult a qualified healthcare provider for medical concerns.</li>
<li><strong>Legal advice:</strong> consult a licensed attorney for legal matters.</li>
<li><strong>Financial advice:</strong> consult a certified financial advisor before making investment decisions.</li>
<li><strong>Technical advice:</strong> verify technical steps before implementation.</li>
</ul>

<h2>Affiliate disclosure</h2>
<p>Wikidocz may participate in affiliate marketing programs. If you click an affiliate link and make a purchase, we may earn a commission at no extra cost to you. We only recommend products or services we believe provide value. Sponsored content and affiliate links are disclosed where applicable.</p>

<h2>Accuracy and updates</h2>
<p>We make reasonable efforts to keep content accurate and up to date. However, information may become outdated, and we accept no responsibility for errors or omissions. Readers should verify critical information independently.</p>

<h2>External links</h2>
<p>Wikidocz links to external websites for reference or convenience. We do not endorse, control, or take responsibility for the content or practices of third-party sites.</p>

<h2>No guarantees</h2>
<p>We do not guarantee that the site will be uninterrupted, error-free, or free from harmful components. Use of the site is at your own risk.</p>',
        ),
        'editorial-policy' => array(
            'post_title'   => 'Editorial Policy',
            'post_content' => '<p>Wikidocz is committed to producing clear, accurate, and useful content. This editorial policy explains how we create, review, and update our articles.</p>

<h2>Sourcing and research</h2>
<ul>
<li>We rely on reputable sources including peer-reviewed studies, official reports, expert interviews, and trusted media outlets.</li>
<li>Sources are linked or cited within articles where practical.</li>
<li>Opinion and analysis pieces are clearly labeled as such.</li>
</ul>

<h2>Correction process</h2>
<ul>
<li>If you find an error, contact us through our contact page with the article URL and the specific issue.</li>
<li>Significant factual errors are corrected promptly with a note explaining the change.</li>
<li>Minor errors (typos, formatting) are corrected without notice.</li>
</ul>

<h2>Article updates</h2>
<ul>
<li>Articles are reviewed periodically and updated when new information becomes available.</li>
<li>The "Last updated" date at the bottom of articles reflects the most recent review.</li>
<li>Outdated articles may be flagged or consolidated into newer content.</li>
</ul>

<h2>AI and automation</h2>
<ul>
<li>We may use AI tools to assist with research, drafting, or editing. All content is reviewed and approved by human editors before publication.</li>
<li>Fully AI-generated content without human review is not published under the Wikidocz name.</li>
</ul>

<h2>Advertising and editorial separation</h2>
<ul>
<li>Editorial content is never influenced by advertisers or sponsors.</li>
<li>Sponsored content and affiliate links are clearly disclosed.</li>
<li>Our editorial team makes independent decisions about what to cover and how to present it.</li>
</ul>

<h2>Transparency</h2>
<ul>
<li>We credit authors and contributors where practical.</li>
<li>Conflicts of interest are disclosed in relevant articles.</li>
<li>This policy is reviewed and updated as needed.</li>
</ul>',
        ),
    );
    foreach ( $content as $slug => $data ) {
        $page = get_page_by_path( $slug, OBJECT, 'page' );
        if ( ! $page ) {
            continue;
        }
        wp_update_post( array(
            'ID'           => $page->ID,
            'post_title'   => $data['post_title'],
            'post_content' => wp_kses_post( $data['post_content'] ),
        ) );
    }
    update_option( 'wikidocz_legal_content_filled', true );
}
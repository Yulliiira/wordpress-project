<?php get_header(); ?>

<div id="wrapper">
    <div id="bg"></div>
    <div id="overlay"></div>
    <div id="main">
        <!-- Header -->
        <header id="header">
            <h1><?php the_title(); ?></h1>
            <p>Let's get in touch</p>

            <nav>
                <ul>
                    <li>
                        <a href="https://www.instagram.com/yulliiira_/profilecard/?igsh=MnJ2dnNwaGxsNGkz"
                            class="icon brands fa-instagram"
                            aria-hidden="true">
                            <span class="label">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@yullliira_?_t=8qfev20DWOV&_r=1"
                            class="icon brands fa-tiktok"
                            aria-hidden="true">
                            <span class="label">TikTok</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/Yulliiira"
                            class="icon brands fa-github"
                            aria-hidden="true">
                            <span class="label">GitHub</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.linkedin.com/in/yuliya-raskatova-769ab0314"
                            class="icon brands fa-linkedin"
                            aria-hidden="true">
                            <span class="label">LinkedIn</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/yulliiira"
                            class="icon brands fa-telegram-plane"
                            aria-hidden="true">
                            <span class="label">Telegram</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Contact Form -->
            <div class="contact-form">
                <?php
                if (shortcode_exists('contact-form-7')) {
                    echo do_shortcode('[contact-form-7 id="YOUR_FORM_ID" title="Contact form"]');
                } else {
                ?>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <div class="fields">
                            <div class="field">
                                <input type="text" name="name" placeholder="Name" required />
                            </div>
                            <div class="field">
                                <input type="email" name="email" placeholder="Email" required />
                            </div>
                            <div class="field">
                                <textarea name="message" placeholder="Message" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="actions">
                            <?php wp_nonce_field('contact_form_submit', 'contact_nonce'); ?>
                            <input type="hidden" name="action" value="contact_form_submission" />
                            <input type="submit" value="Send Message" />
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </header>

        <!-- Footer -->
        <footer id="footer">
            <span class="copyright">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
                Design: Yuliya Raskatova.
            </span>
        </footer>
    </div>
</div>

<?php
// Добавляем обработчик формы
add_action('admin_post_nopriv_contact_form_submission', 'handle_contact_form');
add_action('admin_post_contact_form_submission', 'handle_contact_form');

function handle_contact_form()
{
    if (
        !isset($_POST['contact_nonce']) ||
        !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_submit')
    ) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    wp_mail($to, $subject, $body);

    wp_redirect(add_query_arg('submitted', '1', wp_get_referer()));
    exit;
}
?>

<?php get_footer(); ?>
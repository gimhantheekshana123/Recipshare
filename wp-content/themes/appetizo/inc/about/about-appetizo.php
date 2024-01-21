<?php // About Appetizo

// Add About Appetizo Page
function appetizo_about_page() {
    add_theme_page( esc_html__( 'About Appetizo', 'appetizo' ), esc_html__( 'About Appetizo', 'appetizo' ), 'edit_theme_options', 'about-appetizo', 'appetizo_about_page_output' );
}
add_action( 'admin_menu', 'appetizo_about_page' );

// Render About appetizo HTML
function appetizo_about_page_output() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Welcome to Appetizo!', 'appetizo' ); ?></h1>
        <p class="welcome-text">
            <?php esc_html_e( 'Elevate your website with Appetizo, the ultimate cooking recipe WordPress theme. Crafted to showcase and share your delicious recipes in style. Get started today! Discover the perfect blend of functionality and aesthetics with Appetizo, a top-tier Cooking Recipe WordPress Theme designed to cater to your culinary passion. Whether you\'re a seasoned chef, a food blogger, or a cooking enthusiast looking to share your delectable creations, Appetizo offers an exceptional platform to showcase your recipes in a visually appealing and user-friendly manner. Seamlessly integrating social media, this multipurpose food theme caters to those who seek to celebrate the world of culinary delights. Give Appetizo a try today and embark on a journey of flavor exploration, awakening taste buds and recipe sharing.', 'appetizo' ); ?>
        </p>

        <!-- Tabs -->
        <?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'appetizo_tab_1'; ?>

        <div class="nav-tab-wrapper">
            <a href="<?php echo esc_url('?page=about-appetizo&tab=appetizo_tab_1')?>" class="nav-tab <?php echo $active_tab == 'appetizo_tab_1' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Getting Started', 'appetizo' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-appetizo&tab=appetizo_tab_2')?>" class="nav-tab <?php echo $active_tab == 'appetizo_tab_2' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Recommended Plugins', 'appetizo' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-appetizo&tab=appetizo_tab_3')?>" class="nav-tab <?php echo $active_tab == 'appetizo_tab_3' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Support', 'appetizo' ); ?>
            </a>
            <a href="<?php echo esc_url('?page=about-appetizo&tab=appetizo_tab_4')?>" class="nav-tab <?php echo $active_tab == 'appetizo_tab_4' ? 'nav-tab-active' : ''; ?>">
                <?php esc_html_e( 'Free vs Premium', 'appetizo' ); ?>
            </a>
        </div>

        <!-- Tab Content -->
        <?php if ( $active_tab == 'appetizo_tab_1' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Documentation', 'appetizo' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Appetizo. It is worth to spend 10 minutes and know almost everything about the theme.', 'appetizo' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/appetizo-cooking-recipe-theme-documentation/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'appetizo' ); ?></a>
                </div>


                <div class="column-wdith-3">
                    <h3><?php esc_html_e( 'Theme Customizer', 'appetizo' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'appetizo' ); ?>
                    </p>
                    <a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'appetizo' ); ?></a>
                </div>

            </div>

            <div class="four-columns-wrap">

                <h2><?php esc_html_e( 'Appetizo Premium - Predefined Styles', 'appetizo' ); ?></h2>
                <p>
                    <?php esc_html_e( 'Appetizo Premium\'s powerful setup allows you to easily create unique looking sites. Here are a few included examples that can be installed with one click in the ', 'appetizo' ); ?>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/'); ?>"><?php esc_html_e( 'Appetizo Premium Theme.', 'appetizo' ); ?></a>
                    <?php esc_html_e( 'More details in the theme Documentation.', 'appetizo' ); ?>
                </p>

                <div class="column-wdith-4">
                    <div class="active-style"><?php esc_html_e( 'Active', 'appetizo' ); ?></div>

                    <div>
                        <h2><?php esc_html_e( 'Version 1', 'appetizo' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/appetizo/'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'appetizo' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 2', 'appetizo' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/appetizo/?home=2'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'appetizo' ); ?></a>
                    </div>
                </div>
                <div class="column-wdith-4">

                    <div>
                        <h2><?php esc_html_e( 'Version 3', 'appetizo' ); ?></h2>
                        <a href="<?php echo esc_url('https://demo.vinethemes.com/appetizo/?home=3'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Live Preview', 'appetizo' ); ?></a>
                    </div>
                </div>


            </div>

        <?php elseif ( $active_tab == 'appetizo_tab_2' ) : ?>

            <div class="three-columns-wrap">

                <br>
                <p><?php esc_html_e( 'Recommended Plugins are fully supported by Appetizo theme. They well build the theme by giving more and more features. These are highly recommended to install.', 'appetizo' ); ?></p>
                <br>

                <?php


                // Kirki
                appetizo_recommended_plugin( 'kirki', 'index', esc_html__( 'Kirki', 'appetizo' ), esc_html__( 'Theme advanced customizer options.', 'appetizo' ) );

                // MailChimp
                appetizo_recommended_plugin( 'mailchimp-for-wp', 'mailchimp-for-wp', esc_html__( 'Mailchimp', 'appetizo' ), esc_html__( 'Mail newsletters. Simple but flexible.', 'appetizo' ) );

                // Instagram Widget
                appetizo_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'appetizo' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'appetizo' ) );



                ?>


            </div>

        <?php elseif ( $active_tab == 'appetizo_tab_3' ) : ?>

            <div class="three-columns-wrap">

                <br>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-sos"></span>
                        <?php esc_html_e( 'Forums', 'appetizo' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'appetizo' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/forums/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'appetizo' ); ?></a>
                    </p>
                </div>

                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-book"></span>
                        <?php esc_html_e( 'Documentation', 'appetizo' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Need more details? Please check out appetizo Theme Documentation for detailed information.', 'appetizo' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.vinethemes.com/documentation/appetizo-cooking-recipe-theme-documentation/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'appetizo' ); ?></a>
                    </p>
                </div>


                <div class="column-wdith-3">
                    <h3>
                        <span class="dashicons dashicons-smiley"></span>
                        <?php esc_html_e( 'Donation', 'appetizo' ); ?>
                    </h3>
                    <p>
                        <?php esc_html_e( 'Even a small sum can help us a lot with theme development. If the appetizo theme is useful and our support is helpful, please don\'t hesitate to donate a little bit, at least buy us a Coffee or a Beer :)', 'appetizo' ); ?>
                    <hr>
                    <a target="_blank" href="<?php echo esc_url('https://www.paypal.me/oddthemes'); ?>"><?php esc_html_e( 'Donate with PayPal', 'appetizo' ); ?></a>
                    </p>
                </div>

            </div>

        <?php elseif ( $active_tab == 'appetizo_tab_4' ) : ?>

            <br><br>

            <table class="free-vs-pro form-table">
                <thead>
                <tr>
                    <th>
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Appetizo Premium', 'appetizo' ); ?>
                        </a>

                    </th>
                    <th><?php esc_html_e( 'Appetizo', 'appetizo' ); ?></th>
                    <th><?php esc_html_e( 'Appetizo Premium', 'appetizo' ); ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '100% Responsive and Retina Ready', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Translation Ready', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "appetizo.pot" file included.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'MailChimp Support', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'The most popular email client plugin. Very simple but super flexible.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Image &amp; Text Logos', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Featured Posts Slider', 'appetizo' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Showcase unlimited number of Blog Posts in header area. There are three Slider designs.', 'appetizo' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Background Image/Color', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Set the custom body Background image or Color.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Header Background Image/Color', 'appetizo' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set the custom header Background image or Color.', 'appetizo' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Instagram Widget Area', 'appetizo' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Set your Instagram Images in the footer.', 'appetizo' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>

                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Post Layouts', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Standard, List and Grid Blog Feed layout.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Right Sidebar', 'appetizo' ); ?></h3>
                        <p>
                            <?php esc_html_e( 'Right Widgetised area.', 'appetizo' ); ?>
                        </p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <!-- Only Pro -->
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Unlimited Colors', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( '800+ Google Fonts', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Grid Layout', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'List Layout', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <h3><?php esc_html_e( 'Advanced Footer Options', 'appetizo' ); ?></h3>
                        <p><?php esc_html_e( 'Theme and Author credit links in the footer are automatically removed.', 'appetizo' ); ?></p>
                    </td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
                    <td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
                </tr>


                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="<?php echo esc_url('https://www.vinethemes.com/downloads/appetizo-cooking-recipe-wordpress-theme/'); ?>" target="_blank" class="button button-primary button-hero">
                            <?php esc_html_e( 'Get Appetizo Premium', 'appetizo' ); ?>
                        </a>
                        <br>

                    </td>
                </tr>
                </tbody>
            </table>

        <?php endif; ?>

    </div><!-- /.wrap -->
    <?php
} // end appetizo_about_page_output

// Check if plugin is installed
function appetizo_check_installed_plugin( $slug, $filename ) {
    return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function appetizo_recommended_plugin( $slug, $filename, $name, $description) {

    if ( $slug === 'facebook-pagelike-widget' ) {
        $size = '128x128';
    } else {
        $size = '256x256';
    }

    ?>

    <div class="plugin-card">
        <div class="name column-name">
            <h3>
                <?php echo esc_html( $name ); ?>
                <img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
            </h3>
        </div>
        <div class="action-links">
            <?php if ( appetizo_check_installed_plugin( $slug, $filename ) ) : ?>
                <button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'appetizo' ); ?></button>
            <?php else : ?>
                <a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                    <?php esc_html_e( 'Install Now', 'appetizo' ); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="desc column-description">
            <p><?php echo esc_html( $description ); ?></p>
        </div>
    </div>

    <?php
}

// enqueue ui CSS/JS
function appetizo_enqueue_about_page_scripts($hook) {

    if ( 'appearance_page_about-appetizo' != $hook ) {
        return;
    }

    // enqueue CSS
    wp_enqueue_style( 'appetizo-about-page-css', get_theme_file_uri( '/inc/about/css/about-appetizo-page.css' ) );

}
add_action( 'admin_enqueue_scripts', 'appetizo_enqueue_about_page_scripts' );
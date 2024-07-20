<?php
/*
Plugin Name: Simple Login Form
Description: Plugin para guardar datos de formularios de login en la base de datos y gestionar las entradas.
Version: 1.0
Author: Tu Nombre
*/

// Crear tabla al activar el plugin
function simple_login_form_create_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_form_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        title VARCHAR(255) NOT NULL,
        company VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        status VARCHAR(20) NOT NULL DEFAULT 'pending',
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'simple_login_form_create_table');

// Manejar envíos de formularios
function simple_login_form_handle_submission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['last_name'], $_POST['title'], $_POST['company'], $_POST['message'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'login_form_submissions';

        $data = array(
            'name' => sanitize_text_field($_POST['name']),
            'last_name' => sanitize_text_field($_POST['last_name']),
            'title' => sanitize_text_field($_POST['title']),
            'company' => sanitize_text_field($_POST['company']),
            'message' => sanitize_textarea_field($_POST['message']),
        );

        $wpdb->insert($table_name, $data);

        // Redirige para evitar reenvío del formulario
        wp_redirect(add_query_arg('form_submitted', 'true', $_SERVER['REQUEST_URI']));
        exit;
    }
}
add_action('wp', 'simple_login_form_handle_submission');

// Mostrar mensaje de confirmación en la página del formulario
function simple_login_form_submission_message()
{
    if (isset($_GET['form_submitted']) && $_GET['form_submitted'] === 'true') {
        echo '<p>¡Formulario enviado con éxito!</p>';
    }
}
add_action('wp_head', 'simple_login_form_submission_message');

// Agregar shortcode para el formulario
function simple_login_form_shortcode()
{
    ob_start();
?>
    <form method="post" action="">
        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Name" class="form-input form-input-name" required>
            <input type="text" id="last-name" name="last_name" placeholder="Last Name" class="form-input form-input-last-name" required>
        </div>
        <input type="text" id="title" name="title" placeholder="Title" class="form-input form-input-large" required>
        <input type="text" id="company" name="company" placeholder="Company" class="form-input form-input-large" required>
        <textarea id="message" name="message" placeholder="Message" class="form-textarea" required></textarea>
        <div class="form-action">
            <button type="submit" class="send-button">Send <span class="send-arrow">&#8595;</span></button>
        </div>
    </form>
<?php
    return ob_get_clean();
}
add_shortcode('login_form', 'simple_login_form_shortcode');

// Agregar menú en el admin para gestionar las entradas
function simple_login_form_admin_menu()
{
    add_menu_page('Login Form Submissions', 'Login Form Submissions', 'manage_options', 'login-form-submissions', 'simple_login_form_admin_page', 'dashicons-list-view', 26);
}
add_action('admin_menu', 'simple_login_form_admin_menu');

function simple_login_form_admin_page()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'login_form_submissions';

    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
        // Editar entrada
        $id = intval($_GET['id']);
        $entry = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
        
        if ($entry) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = array(
                    'name' => sanitize_text_field($_POST['name']),
                    'last_name' => sanitize_text_field($_POST['last_name']),
                    'title' => sanitize_text_field($_POST['title']),
                    'company' => sanitize_text_field($_POST['company']),
                    'message' => sanitize_textarea_field($_POST['message']),
                    'status' => sanitize_text_field($_POST['status']),
                );

                $wpdb->update($table_name, $data, array('id' => $id));
                echo '<div class="updated"><p>Entrada actualizada correctamente.</p></div>';
            }

            ?>
            <h2>Editar Entrada</h2>
            <form method="post" action="">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="name">Name</label></th>
                        <td><input name="name" type="text" id="name" value="<?php echo esc_attr($entry->name); ?>" class="regular-text" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="last_name">Last Name</label></th>
                        <td><input name="last_name" type="text" id="last_name" value="<?php echo esc_attr($entry->last_name); ?>" class="regular-text" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="title">Title</label></th>
                        <td><input name="title" type="text" id="title" value="<?php echo esc_attr($entry->title); ?>" class="regular-text" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="company">Company</label></th>
                        <td><input name="company" type="text" id="company" value="<?php echo esc_attr($entry->company); ?>" class="regular-text" required></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="message">Message</label></th>
                        <td><textarea name="message" id="message" class="large-text" required><?php echo esc_textarea($entry->message); ?></textarea></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="status">Status</label></th>
                        <td>
                            <select name="status" id="status">
                                <option value="pending" <?php selected($entry->status, 'pending'); ?>>Pending</option>
                                <option value="contacted" <?php selected($entry->status, 'contacted'); ?>>Contacted</option>
                                <option value="discarded" <?php selected($entry->status, 'discarded'); ?>>Discarded</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <p class="submit"><input type="submit" class="button-primary" value="Guardar cambios"></p>
            </form>
            <?php
        } else {
            echo '<div class="error"><p>Entrada no encontrada.</p></div>';
        }
    } elseif (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        // Eliminar entrada
        $id = intval($_GET['id']);
        $wpdb->delete($table_name, array('id' => $id));
        echo '<div class="updated"><p>Entrada eliminada correctamente.</p></div>';
    } else {
        // Mostrar lista de entradas
        $entries = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
        ?>
        <div class="wrap">
            <h2>Login Form Submissions</h2>
            <table class="widefat">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entries as $entry) : ?>
                        <tr>
                            <td><?php echo esc_html($entry->id); ?></td>
                            <td><?php echo esc_html($entry->name); ?></td>
                            <td><?php echo esc_html($entry->last_name); ?></td>
                            <td><?php echo esc_html($entry->title); ?></td>
                            <td><?php echo esc_html($entry->company); ?></td>
                            <td><?php echo esc_html($entry->message); ?></td>
                            <td><?php echo esc_html($entry->status); ?></td>
                            <td>
                                <a href="<?php echo add_query_arg(array('action' => 'edit', 'id' => $entry->id)); ?>">Edit</a> |
                                <a href="<?php echo add_query_arg(array('action' => 'delete', 'id' => $entry->id)); ?>" onclick="return confirm('Are you sure you want to delete this entry?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
?>

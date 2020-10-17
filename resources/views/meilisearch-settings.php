<div class="wrap woocommerce">
  <h1>MeiliSearch</h1>
  <form method="post" id="mainform" action="" enctype="multipart/form-data">
    <h1 class="screen-reader-text">Settings</h1>
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row" class="titledesc">
            <label for="meilisearch_hostname">Hostname</label>
          </th>
          <td class="forminp forminp-text">
            <input name="meilisearch_hostname" id="meilisearch_hostname" class="regular-text" type="text" value="">
            <p class="description" id="meilisearch_hostname-description">In most cases the IP address of the server.</p>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row" class="titledesc">
            <label for="meilisearch_port">Port</label>
          </th>
          <td class="forminp forminp-text">
            <input name="meilisearch_port" id="meilisearch_port" class="regular-text" type="text" value="">
            <p class="description" id="meilisearch_hostname-description">Default port for MeiliSearch is 7070.</p>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row" class="titledesc">
            <label for="meilisearch_master_key">Master Key</label>
          </th>
          <td class="forminp forminp-text">
            <input name="meilisearch_master_key" id="meilisearch_master_key" class="regular-text" type="text" value="">
            <p class="description" id="meilisearch_hostname-description">The master key will be stored in plain text. For improved security, we highly recommend using your site's WordPress configuration file to set your master key according to the following definition:<br>
            <br>
            <code>define( 'WCMS_MASTER_KEY', '' );</code></p>
          </td>
        </tr>
        </tbody>
      </table>
      <p class="submit">
        <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes">Save changes</button>
        <input type="hidden" id="_wpnonce" name="_wpnonce" value="ae80756ee2">
        <input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=wc-settings">
      </p>
  </form>
</div>

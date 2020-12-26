<VirtualHost *:80>
  ServerName phpblog.com
  DocumentRoot "C:/User/MSI/Desktop/program/php-blog/frontend/web/"

  <Directory "C:/User/MSI/Desktop/program/php-blog/frontend/web/">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Otherwise forward the request to index.php
    RewriteRule . index.php
    # use index.php as index file
    DirectoryIndex index.php
    # ...other settings...
  </Directory>
</VirtualHost>

<VirtualHost *:80>
  ServerName admin.phpblog.com
  DocumentRoot "C:/User/MSI/Desktop/program/php-blog/backend/web/"
  <Directory "C:/User/MSI/Desktop/program/php-blog/backend/web/">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Otherwise forward the request to index.php
    RewriteRule . index.php
    # use index.php as index file
    DirectoryIndex index.php
    # ...other settings...
  </Directory>
</VirtualHost>
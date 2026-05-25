# cPanel Theme Deploy

This folder exists so the WordPress theme can be pulled from GitHub and copied to cPanel without using the zip package.

The only production theme folder name is:

- `kolseg-design-services`

The deployable theme folder is:

- `cpanel-theme/kolseg-design-services`

The clean installable zip is:

- `wp-theme/kolseg-design-services.zip`

Suggested cPanel workflow:

1. Clone this repo somewhere outside `public_html`.
2. Run `git pull` whenever updates are pushed.
3. If you need to rebuild the deploy mirror or install zip locally first, run `powershell -ExecutionPolicy Bypass -File .\build-theme-package.ps1`
4. Run `bash cpanel-theme/deploy-theme.sh /home/USERNAME/public_html/wp-content/themes`

That command will sync `cpanel-theme/kolseg-design-services` into:

- `/home/USERNAME/public_html/wp-content/themes/kolseg-design-services`

Notes:

- `wp-theme/kolseg-design-services` is the source theme used for packaging.
- `cpanel-theme/kolseg-design-services` is the pull-friendly copy for cPanel terminal deploys.
- After deployment in WordPress admin, activate `Kolseg Design Services` if needed.
- Then go to `Appearance > Kolseg Setup` and run `Force Refresh Seeded Pages`.
- The theme should appear in `Appearance > Themes` with the folder slug `kolseg-design-services`.

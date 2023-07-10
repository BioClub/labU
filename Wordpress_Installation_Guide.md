(This page is out-of-date and only maintaine for historic reasons)

## Option 1: Wordpress

While the basic Wordpress is free and open-source, the necessary plug-ins that are needed for a complex, multi-lingual site are not. Both [WPML](https://wpml.org/purchase/) and [Advanced Custom Fields/ACF](https://www.advancedcustomfields.com) have switch their previous "life-time" accounts to yearly-billed account. That means we would have to pay each year $99 for WMPL and $149 for ACF.

Wordpress was my choice of CMS, because it was relatively easy to get clear, junk-free output, the recently introduced API was great for headerless systems, and clients were familiar with the back-end.

The introduction of the Gutenberg Block Editor was great for being more expressive on indivial site, but a horror for sites which require a more structured content. I practically never used it for my own or client sites.

Plus:
- User Management
- Native Search
- Markdown (with my Plugin)
- Custom Fields
- Lots of experience with Theme Development
Minus:
- ACF Pro & WPML cost ~$250/year



# WordPress Installation Guide

- Locally install the latest [Wordpress](https://wordpress.org/download/) version.
- Install the lastest Plugins listest below
- Clone the Theme in this repo

### Necessary Plugins
Free plugins are in `\_plugins` folder, paid plugins need to be installed separately. Please ask in the BioClub Discord #website channel for details.

#### Free
* [Classic Editor](https://wordpress.org/plugins/classic-editor/)

#### Paid
* [WPML](https://wpml.org) Multi-Language
* [ACF Pro](https://www.advancedcustomfields.com)
* _Get [help](https://fb.me/trembl) with the Dev Setup_

#### Optional
* [ACF Sync](https://github.com/thomascharbit/acf-sync) Importing ACFs from Dev to Production
* [WP DB Backup](https://wordpress.org/plugins/wp-db-backup/) Exporting DB

## Option 3: Static Site Generators (MkDocs, Hugo, Jekyll)

SSGs are great for Documentation Pages, but they are not great for site with multiple users, as they usually don't provide user management. That would have to been done in GitHub, which would mean 

Plus:
+ Fast
+ Markdown

Missing:
- No User Management
- No Custom Fields
- File Conflicts
- No DB for generating Pages
- No native Search

# BioClub Tokyo Community Website

Public Development for the  BioClub Tokyo Community Website. Theme for [BioClub Tokyo](http://www.bioclub.tokyo).

The [old BioClub](bioclub.org) Website at is a bit chaotic, it does not really reflect all the projects, events and experiments happening at BioClub.

Unfortunately it's not possible for the BioClub community to change/update the CMS and structure of the server, therefore we decided to make a new website - where we can implement the needs and requirements of the community.

The website and it's theme should also be free and open-source. Some members of the BioClub Community have experience and expertise in [Wordpress](https://wordpress.org), so let's build upon that!

# Discussion

What do you want from the site? What is still missing? What is needed to run the BioClub? Please write your ideas/suggestions at the [Wiki](https://github.com/BioClub/BioClub-Wordpress-Theme/wiki).

There is also a [Google Doc](https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing) for easily sharing the ideas.

# Structure

Site structure ideas/suggestion should go into the `\_structure` folder.

# Design

New Designs ideas/suggestion should go into the `\_design` folder.

Here is also a shared [Figma Project](https://www.figma.com/file/UlvsISNrw5YMwFB7B3MuC6/BioClub-Tokyo---Website?type=design&node-id=0%3A1&mode=design&t=hWTEsAzRiLPzzu5x-1) where we can jointly develop the Design for the Website.

1. Design in Figma, XD or any other software
2. Make Production-ready HTML/CSS
3. Implement as Theme in PHP

# Development

What we need:
- User Management & Roles
- Multi-lingual JP/EN
- MarkDown
- Custom Post/Page Types (ie. Events, Inventory, News)
- Strong Custom Fields Support
- Server-side Image Resize


## Option 1: Wordpress

While the basic Wordpress is free and open-source, the necessary plug-ins that are needed for a complex, multi-lingual site are not. Both [WPML](https://wpml.org/purchase/) and [Advanced Custom Fields/ACF](https://www.advancedcustomfields.com) have switch their previous "life-time" accounts to yearly-billed account. That means we would have to pay each year $99 for WMPL and $149 for ACF.

Wordpress was my choice of CMS, because it was relatively easy to get clear, junk-free output, the recently introduced API was great for headerless systems, and clients were familiar with the back-end.

The introduction of the Gutenberg Block Editor was great for being more expressive on indivial site, but a horror for sites which require a more structured content. I practically never used it for my own or client sites.


## Option 2: ProcessWire (currently evaluating)

Processwire is ... differnt. It requires you to build the site from scratch

## Option 3: Static Site Generators (MkDocs, Hugo, Jekyll)

SSGs are great for Documentation Pages, but they are not great for site with multiple users, as they usually don't provide user management. That would have to been done in GitHub, which would mean 

+ Fast

- No User Management
- File Conflicts
- No DB for generating Pages
- No native Search


## WordPress Installation (outdated)

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

# TODO
- [x] Upgrade to Wordpress 6
- [x] Make Developement site at [https://bioclub.tokyo](https://bioclub.tokyo)
- [ ] Make Accounts for BioClub Community Members
- [x] Add SSL Certificate via [Let's Encrypt](https://letsencrypt.org), so we can have https://bioclub.toyko
- [ ] Add Contact Form!
- [ ] Make Bi-Lingual, Japanese/English

Shall we move that to [issues](https://github.com/BioClub/BioClub-Wordpress-Theme/issues)?


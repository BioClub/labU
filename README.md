# BioClub Wordpress Theme

Public Development for our shiny, new Wordpress Theme for [BioClub Tokyo](http://www.bioclub.tokyo).

The current (June 2022) situation at bioclub.org is a bit chaotic. The site is at the moment run with dev version of CraftCMS, the initial design, coding and hosting was kindly provided by our host at FabCafe/Loftwork. Unfortunately, the BioClub Community was not given access to the theme or the server, so we can not contribute to the development.
Also, the site is currently not managed by the Community - that means the community can not make posts or reviews or change the structure of the site. The only director who can currently update content on bioclub.org is a bit too busy with other works, as a result, not all the events and info at BioClub make it to bioclub.org

The BioClub Community wants to (and can) develop the site - and help in running it. While [CraftCMS](https://craftcms.com) is a great platform, we want a software that is free and open-source (and has a GPLv2 License). In the tradition of hackerspace, the website and it's theme should also be free and open-source. Some members of the BioClub Community have experience and expertise in [Wordpress](https://wordpress.org), let's build upon that!

# Discussion

What do you want from the site? What is still missing? What is needed to run the BioClub? Please write your ideas/suggestions at the [Wiki](https://github.com/BioClub/BioClub-Wordpress-Theme/wiki).

There is also a Google Doc for easily Sharing Ideas: https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing 
Please ping a BioClub Admin for Write Access.

# Structure

Site structure ideas/suggestion should go into the \_structure folder.

# Designer

- HTML
- CSS

New Designs ideas/suggestion should go into the \_design folder.

Here is also a shared [Figma Project](https://www.figma.com/file/UlvsISNrw5YMwFB7B3MuC6/BioClub-Tokyo---Website?type=design&node-id=0%3A1&mode=design&t=hWTEsAzRiLPzzu5x-1) where we can jointly develop the Design for the Website.

# Developer

- Wordpress & PHP
- Javascript, jQuery?, Vue?

## Installation

- Locally install the latest [Wordpress](https://wordpress.org/download/) version.
- Install the lastest Plugins listest below
- Clone the Theme in this repo

### Necessary Plugins
Free plugins are in \_plugins folder, paid plugins need to be installed separately.

#### Free
* [Classic Editor 1.5](https://wordpress.org/plugins/classic-editor/)

#### Paid
* [WPML 4.2.6](https://wpml.org) Multi-Language
* [ACF Pro 5.7.13](https://www.advancedcustomfields.com)
* _Get [help](https://fb.me/trembl) with the Dev Setup_

#### Optional
* [ACF Sync](https://github.com/thomascharbit/acf-sync) Importing ACFs
* [WP DB Backup](https://wordpress.org/plugins/wp-db-backup/) Exporting DB

# TODO
- [x] Upgrade to Wordpress 5
- [ ] Make Developement site at [https://bioclub.tokyo](https://bioclub.tokyo)
- [ ] Give Access to BioClub Community Members
- [ ] Migrate to Guttenberg Editor
- [ ] Add MarkDown Block
- [ ] Add SSL Certificate via [Let's Encrypt](https://letsencrypt.org), so we can have https://bioclub.toyko
- [ ] Add Contact Form!

Shall we move that to [issues](https://github.com/BioClub/BioClub-Wordpress-Theme/issues)?


# BioClub Tokyo Community Website

Public Development for the  BioClub Tokyo Community Website. Theme for [BioClub Tokyo](http://www.bioclub.tokyo).

The [old BioClub](http://bioclub.org) Website at is a bit chaotic, it does not really reflect all the projects, events and experiments happening at BioClub.

Unfortunately it's not possible for the BioClub community to change/update the CMS and structure of the server, therefore we decided to make a new website - where we can implement the needs and requirements of the community.

The website and it's theme should also be free and open-source.

# Discussion & Content

- What do you want from the site?
- What is still missing?
- What is needed to run the BioClub?

Please write your ideas, suggestions and proposed content in the 
# [Shared Google Doc](https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing).


# Site Structure

Site structure ideas/suggestion should go into the `\_structure` folder.

# Design & HTML

New Designs ideas/suggestion should go into the `\_design` folder.

1. Design in Figma, XD or any other software
2. Make Production-ready HTML/CSS
3. Implement as Theme in PHP

### Figma

Here is also a shared [Figma Project](https://www.figma.com/file/UlvsISNrw5YMwFB7B3MuC6/BioClub-Tokyo---Website?type=design&node-id=0%3A1&mode=design&t=hWTEsAzRiLPzzu5x-1) where we can jointly develop the Design for the Website.

### XD

We also have a shared XD Document, please ask in the [Discord](https://discord.bioclub.tokyo) #website channel for access.

# Development

[Wordpress used to be the universal tool of choice](https://github.com/BioClub/labu/Wordpress_Installation_Guide.md), but in recent releases Wordpress went more into an Website-Builder direcetion, rather than strengthening the CMS aspects of it, to a point where it does not longer make sense to bend Wordpress to function as a CMS.

After evaluation other framesworks and alternatives like SSGs, we decided to build the new BioClub Community Website using [ProcessWire](https://www.processwire.com).

What we need/want from a CMS/CMF:

- [x] [Free and Open-Source Software](https://github.com/processwire/processwire/blob/master/LICENSE.TXT)
- [x] User Management & Roles
- [x] Bi-lingual JP/EN
- [x] MarkDown
- [x] Custom Post/Page Types (ie. Events, Inventory, News, etc)
- [x] Strong Custom Fields Support
- [x] Server-side Image Resize
- [x] Security

## TODO

- [x] Add SSL Certificate via [Let's Encrypt](https://letsencrypt.org), so we can have https://bioclub.toyko
- [x] Make Developement Site at [https://bioclub.tokyo](https://bioclub.tokyo)
- [x] Install ProcessWire ar Developement Site
- [ ] Make Basic Pages
- [ ] Make Site Bi-lingual, Japanese/English
- [ ] Make Accounts for BioClub Community Members
- [ ] Add Contact Form!

Please share your ideas, whishes and content at the [Google Docs](https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing) , and any more Development-related issues at [GitHub Issues](https://github.com/BioClub/BioClub-Wordpress-Theme/issues).


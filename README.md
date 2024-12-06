# BioClub Tokyo LIMS

## A ProcessWire-based LIMS (Laboratory Information Management System) for Community Labs & Hackerspaces

URL: [www.bioclub.tokyo](http://www.bioclub.tokyo).

## Goals

The goals of the site are to:

- Showcase Members & Projects
- Announce and Document Events, Talks & Workshops
- Explain usage guidelines of the Lab
- Show available machines, devices and reagents

The website is developed and designed by voluteers. If you want to help/assist/particiapte, please visit the #website channel on the BioClub Discord (https://discord.bioclub.tokyo).

# Development

Wordpress used to be the universal tool of choice, but in recent releases Wordpress went more into an Website-Builder direction, rather than strengthening the CMS aspects of it. (Looking at you, Block Editor). It came to a point where it does not longer make sense to bend and modify Wordpress to function as a CMS/CMF.

Also, the move of both ACF and WPML from perpetual license to a yearly subscription fee makes Wordpress even less attractive.

After evaluation other framesworks and alternatives like SSGs, we decided to build the new BioClub Community Website using [ProcessWire](https://www.processwire.com). If there are other solutions that you think might be a better fit, please share them in #website on the [BioClub Discord](https://discord.bioclub.tokyo) - and ideally make a test site, so we can evaluate it.

For detail on how to install a local development setup of the site, please have a look at [INSTALLATION.md](INSTALLATION.md).

### TailwindCSS

[TailwindCSS](https://tailwindcss.com) is another take on a utility-first CSS framework, the advantage of mix-ins and smaller file size, come with a slightly more [complex dev-setup](https://tailwindcss.com/docs/installation), that might deter first-time users, but comes with the benefit of smaller, tailor-made CSS files.

See the Tailwind Examples in the [\_html](https://github.com/BioClub/labU/_html) folder.

> Why don't we just use code exported from Figma or XD?
Because the generate code is very messy, slow and difficult to update. Exactly what we don't want.


# Use Cases

## 1. Events

- Create an `Event Page` with all the necessary event info.
- Based on that data, create an `Event Overview Page`, showing all future events, ordered by date, including resized image previews, title, and event abstract.
- Once the event is finished - i.e. the `event date` is older than the current date, the event page moves to the `Event Archive Page`.
- User can write `Event Reports`, which can be linked to the `Event Page`. Links to the `Event Reports` appear on the `Event Page.`

## 2. News & Reports

## 3. BioClub Members

BioClub Members should register using [BioClub Member Form](https://forms.gle/RdKtDLsee2776jTW7), then we will make a Member account. They can the edit/change their member page, and be added to any number of _Project_ pages. Members can also create Posts, Events, and edit the Inventory.

## 4. BioClub Projects

- A _BioClub Project_ is a place to document and share information about a project.
- Project can have _Project Members_, each member can edit the project site and create/edit any number of sub-sites.

### 4.1 Creating a Project (for Admins)

- An Admin needs to initially create the project with template _New Project_.
- On save, a new template and a new role is created, handling the user permissions, based upon the members on the project page.
- On subsequent save, the user permissions are updated.

## 5. Wiki

The Wiki-section of the site it where all members have edit & write access. 

### Requirements

What we need/want from a CMS/CMF:

- [x] [Free and Open-Source Software](https://github.com/processwire/processwire/blob/master/LICENSE.TXT)
- [x] Needs to run on Apache on a Shared Server (LAMP)
- [x] User Management (Create new Users, change/update User Profile)
- [x] User Password Reset
- [x] Role-based Access Control (Admin, Editor, Project Member etc.)
- [x] Bi-lingual JP/EN
- [x] MarkDown
- [x] Custom Post/Page Types (ie. Events, Inventory, News, etc)
- [x] Support for Custom Fields [Support](_structure/ProcessWire.md)
- [x] Server-side Image Resizing
- [x] https://


### ProcessWire Installation

- ProcessWire [Installation](INSTALLATION.md) Notes.
- Screenshots with [ProcessWire Examples](_structure/ProcessWire.md).

## TODO

- [x] Add SSL Certificate via [Let's Encrypt](https://letsencrypt.org), so we can have https://bioclub.toyko
- [x] Make Development Site at [https://bioclub.tokyo](https://bioclub.tokyo)
- [x] Install ProcessWire at Development Site
- [x] Create Template/Fields Export/Import System
- [x] Make Basic Pages
- [x] Make Site Bi-lingual, Japanese/English
- [x] Make Accounts for BioClub Community Members
- [x] Create Project-specific Permissions & Roles
- [ ] ~~Add Contact Form!~~ Please use [BioClub Discord](https://discord.bioclub.tokyo)!
- [ ] Language-specific Search. [Example](https://github.com/ryancramerdesign/ProcessWire/blob/master/site-default/templates/search.php)
- [ ] Wiki-like Pages

# Discussion & Content

- What do you want from the site?
- What is still missing?
- What is needed to run the BioClub?

Please write your ideas, suggestions and proposed content in the
[Shared Google Doc](https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing).

We also made a [Shared Google Sheet](https://docs.google.com/spreadsheets/d/1IQ1l39ResywoN4pn5pU7LXOjepU_J1jULcCjwXe4JaE/edit#gid=0) to track the tasks and processes. Idealy we could move it to GitHub Issues/Projects, but let's work now with tools that everyone is familiar with.

Please share your ideas, wishes and content at the [Google Docs](https://docs.google.com/document/d/1o2WTNjTxkZYKmCmdziS-a4XgKwddnrclsKorgtMeCUo/edit?usp=sharing).

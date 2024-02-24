# MOD_CARDUEBERGHSVS. Joomla site module.

## DE
Joomla-Frontend-Modul. Für eine einzelne Internetseite erstellt. Da hebe ich noch nicht mal Lust, mir eine Beschreibung aus den Fingern zu saugen.

## EN
Joomla frontend module. Created for a single website. I don't even want to suck a description out of my fingers.

## Releases/Downloads
- https://github.com/GHSVS-de/mod_cardueberghsvs/releases

-----------------------------------------------------

# My personal build procedure (WSL 1 or 2, Debian, Win 10)
- Prepare/adapt `./package.json`.
- `cd /mnt/z/git-kram/mod_cardueberghsvs`

## node/npm updates/installation
- `npm run updateCheck` or (faster) `npm outdated`
- `npm run update` (if needed) or (faster) `npm update --save-dev`
- `npm install` (if needed)

## Build installable ZIP package
- `node build.js`
- New, installable ZIP is in `./dist` afterwards.
- All packed files for this ZIP can be seen in `./package`. **But only if you disable deletion of this folder at the end of `build.js`**.s

### For Joomla update and changelog server
- Create new release with new tag.
  - See release description in `dist/release_no-changelog.txt`.
- Extracts(!) of the update XML for update servers are in `./dist` as well. Copy/paste and necessary additions.

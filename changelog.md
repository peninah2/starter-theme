/* ----------------------- ------ 2022 ----------------------------*/

-- Added anchor support to spacer block
-- Removes gap on button block, Safari ~13 doesn't support gap for flexbox. Replace with margin. Update when don't have to support Safari 13


/* ----------------------- July 14, 2022 ----------------------------*/

-- Sticky header only on scroll. Removed js to calculate height of header.
-- Moved check for h1 block off of page.php and into inc/layouts.php
-- Replaced jquery smooth-scroll with css (scroll-padding-top, scroll-behavior)
-- Removed default padding on columns and media-text blocks, added it only if there is a background 
-- add .grid, .col-3, .col-4 for gap (don't use flexgap, doesn't work on older Safari)



/* -----------------------   June 20, 2022 ----------------------------*/

-- Added custom cover block styles to give option to contain images (not cover), ie align image to top/left/etc.

-- Added/revised flexbox classes:
   -- Removed flex-half, flex-fourth etc
   -- "col-3" will make responsive columns when added to "flexbox" container. Flex items must have a class of "flex-item." 
   -- "flex-gap" added to flexbox container will add gap property.

-- Make stacked buttons equal width

-- Added a11y script for dropdowns. May need further work.
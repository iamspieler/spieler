<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @var Model_Category $node
 * @var Model_Category $root
 * @var Boolean|Database_Result $categories
 * @var string $message
 *
 * @author     Novichkov Sergey(Radik) <novichkovsergey@yandex.ru>
 * @copyright  Copyrights (c) 2012 Novichkov Sergey
 */
?><!DOCTYPE html>
<html>
    <head>
        <title>Categories</title>
        <style type="text/css">
            *{ margin: 0; padding: 0; }
            html, body{ width: 100%; height: 100%; }
            a:hover{ text-decoration: none; }
            #wrap{ margin: 0 auto; width: 960px; }
            #wrap h2{ margin: 20px 0; }
            #wrap .message{ padding: 5px; border: 3px solid #00f; color: #00f; margin-bottom: 20px; }
            #wrap .row{ margin-bottom: 5px; }
            #wrap .row label{ display: block; margin-bottom: 5px; }
            #wrap .row input, #wrap .row textarea, #wrap .row select{ width: 100%; }
            #wrap .row textarea{ height: 100px; resize: vertical; }
            #wrap .controls{ text-align: right }
        </style>
    </head>
 
    <body>
        <div id="wrap">
            <h2><?php echo $node->loaded() ? 'Edit' : 'New' ?> Category</h2>
            <?php if ($message) : ?>
            <div class="message"><?php echo HTML::chars($message) ?></div>
            <?php endif; ?>
            <form method="POST" action="http://localhost/spieler/pages/save/" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row">
                    <?php $parent = $node->get_parent() ?>
                    <label for="category_parent">Parent</label>
                    <select name="parent" id="category_parent">
                        <option value="<?php echo $root->id_page ?>">Root</option>
                        <?php if ($pages AND $pages->count() > 0) : ?>
                        <?php foreach ($pages as $page) : ?>
                            <option<?php if ($page->id_page == $parent->id_page) : ?> selected="selected"<?php endif ?> value="<?php echo $page->id_page ?>"><?php echo str_repeat(' ', $page->level * 3), HTML::chars($page->name) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="row">
                    <label for="category_name">Name</label>
                    <input type="text" name="name" value="<?php echo HTML::chars($node->name) ?>" id="category_name">
                </div>
                <div class="row">
                    <label for="category_description">Description</label>
                    <textarea rows="10" cols="10" name="description" id="category_description"><?php echo HTML::chars($node->description) ?></textarea>
                </div>
                <div class="controls">
                    <a href="http://localhost/spieler/pages/" title="Back to list">Back to list</a>
                    <input type="submit" value="<?php echo $node->loaded() ? 'Save' : 'Create' ?>">
                    <input type="hidden" name="id_page" value="<?php echo HTML::chars($node->id_page) ?>">
                </div>
            </form>
        </div>
    </body>
</html>
<?php defined('SYSPATH') or die('No direct script access.');
/**
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
            #wrap h2 a{ float: right; }
            #wrap .message{ padding: 5px; border: 3px solid #00f; color: #00f; margin-bottom: 20px; }
            #wrap table{ width: 100%; border-collapse: collapse; }
            #wrap table th, td{ border: 1px solid #000; padding: 5px; vertical-align: top; }
            #wrap table th{ background: #000; color: #fff; }
            #wrap .actions{ white-space: nowrap; width: 1%; }
        </style>
    </head>
 
    <body>
        <div id="wrap">
            <h2>Categories <a href="<?php echo Route::url('default', array('controller' => 'pages', 'action' => 'new')) ?>" title="New">New</a></h2>
            <?php if ($message) : ?>
                <div class="message"><?php echo HTML::chars($message) ?></div>
            <?php endif; ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="actions">Actions</th>
                </tr>
                <?php if ($pages AND $pages->count() > 0) : ?>
                    <?php foreach($pages as $page) : /** @var Model_Category $category **/ ?>
                        <tr>
                            <td style="padding-left: <?php echo 5 + ($page->level - 1) * 10 ?>px"><?php echo HTML::chars($page->name) ?></td>
                            <td><?php echo HTML::chars($page->description) ?></td>
                            <td class="actions">
                                <a title="Edit" href="<?php echo Route::url('default', array('controller' => 'pages', 'action' => 'edit', 'id' => $page->id_page)) ?>">Edit</a> |
                                <a title="Delete" href="<?php echo Route::url('default', array('controller' => 'pages', 'action' => 'delete', 'id' => $page->id_page)) ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="3">Tree of categories is empty</td></tr>
                <?php endif; ?>
            </table>
        </div>
    </body>
</html>
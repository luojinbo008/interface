<?php
/**
 * 网站内容 博客 + 新闻
 * Created by PhpStorm.
 * User: luojinbo
 * Date: 2016/11/23
 * Time: 10:50
 */
return [
    'getBlogCategoryList.json' => [
        'name' => "获得博客分类列表",
        'type' => 'GET',
        'args' => [
            'filter_name'   => 'string',
            'sort'          => 'string',
            'order'         => 'string',
            'start'         => 'int',
            'limit'         => 'int',
        ],
    ],
    'addBlogCategory.json'  => [
        'name' => "新增博客分类",
        'type' => 'POST',
        'args' => [
            'blog_category_name'                => 'string|empty',
            'blog_category_meta_title'          => 'string|empty',
            'blog_category_description'         => 'string',
            'blog_category_meta_description'    => 'string',
            'blog_category_meta_keyword'        => 'string',
            'parent_id'                         => 'int',
            'blog_category_store'               => 'array',
            'image'                             => 'string',
            'sort_order'                        => 'int',
            'status'                            => 'int',
        ],
    ],
    'getBlogCategory.json'   => [
        'name' => "获得博客分类信息",
        'type' => 'GET',
        'args' => [
            'blog_category_id'  => 'int|empty',
            'get_store'         => 'int',
        ],
    ],
    'editBlogCategory.json'  => [
        'name' => "编辑博客分类",
        'type' => 'POST',
        'args' => [
            'blog_category_id'                  => 'int|empty',
            'blog_category_name'                => 'string|empty',
            'blog_category_meta_title'          => 'string|empty',
            'blog_category_description'         => 'string',
            'blog_category_meta_description'    => 'string',
            'blog_category_meta_keyword'        => 'string',
            'parent_id'                         => 'int',
            'blog_category_store'               => 'array',
            'image'                             => 'string',
            'sort_order'                        => 'int',
            'status'                            => 'int',
        ],
    ],
    'repairBlogCategory.json'  => [
        'name' => "重构博客分类树状结构",
        'type' => 'GET',
        'args' => [
        ],
    ],
    'deleteBlogCategory.json'  => [
        'name' => "删除博客分类",
        'type' => 'GET',
        'args' => [
            'blog_category_ids'      => 'array|empty'
        ],
    ],
    'getBlogList.json'  => [
        'name' => "获得博客列表",
        'type' => 'GET',
        'args' => [
            'filter_title'	  => 'string',
            'filter_status'   => 'int',
            'filter_blog_ids' => 'array',
            'sort'            => 'string',
            'order'           => 'string',
            'start'           => 'int',
            'limit'           => 'int'
        ],
    ],
    'addBlog.json'  => [
        'name' => "新增博客",
        'type' => 'POST',
        'args' => [
            'created'               => 'string',
            'status'                => 'int',
            'user_id'               => 'int|empty',
            'hits'                  => 'int',
            'image'                 => 'string',
            'video_code'            => 'string',
            'featured'              => 'int',
            'sort_order'            => 'int',
            'title'                 => 'string|empty',
            'brief'                 => 'string',
            'description'           => 'string',
            'meta_title'            => 'string',
            'meta_keyword'          => 'string',
            'meta_description'      => 'string',
            'tag'                   => 'string',
            'blog_store'            => 'array',
            'blog_blog_category'    => 'array',
            'product_related'       => 'array',
            'blog_related'          => 'array',
        ],
    ],
    'deleteBlog.json'  => [
        'name' => "删除博客",
        'type' => 'GET',
        'args' => [
            'blog_ids'      => 'array|empty'
        ],
    ],
];

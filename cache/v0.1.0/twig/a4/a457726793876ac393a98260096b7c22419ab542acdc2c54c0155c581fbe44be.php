<?php

/* search.twig */
class __TwigTemplate_4b8cbe2263c58d256eb51f3e3d02a8174a419f86922477deba75bca0f7135fa1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "search.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_content' => array($this, 'block_page_content'),
            'js_search' => array($this, 'block_js_search'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_b1b1929ef608693e0ee7cca1082b6159fb4261f423849e4fa22ae4d17d5625a6"] = $this->loadTemplate("macros.twig", "search.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Search | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "search-page";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <div class=\"page-header\">
        <h1>Search</h1>
    </div>

    <p>This page allows you to search through the API documentation for
    specific terms. Enter your search words into the box below and click
    \"submit\". The search will be performed on namespaces, clases, interfaces,
    traits, functions, and methods.</p>

    <form class=\"form-inline\" role=\"form\" action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "search.html"), "html", null, true);
        echo "\" method=\"GET\">
        <div class=\"form-group\">
            <label class=\"sr-only\" for=\"search\">Search</label>
            <input type=\"search\" class=\"form-control\" name=\"search\" id=\"search\" placeholder=\"Search\">
        </div>
        <button type=\"submit\" class=\"btn btn-default\">submit</button>
    </form>

    <h2>Search Results</h2>

    <div class=\"container-fluid\">
        <ul class=\"search-results\"></ul>
    </div>

    ";
        // line 31
        $this->displayBlock("js_search", $context, $blocks);
        echo "

";
    }

    // line 35
    public function block_js_search($context, array $blocks = array())
    {
        // line 36
        echo "    <script type=\"text/javascript\">

        (function() {
            var term = Sami.cleanSearchTerm();

            if (!term) {
                \$('h2').hide();
                return;
            }

            \$('#search').val(term);
            var container = \$('.search-results');

            // create the search index
            ";
        // line 50
        $this->displayBlock("search_index", $context, $blocks);
        echo "

            var results = Sami.search(term);
            var len = results.length;

            if (len == 0) {
                container.html('No results were found');
                return;
            }

            for (var i = 0, text_content = ''; i < len; i++) {

                var ele = results[i];
                var contents = '<li><h2 class=\"clearfix\">';
                var class_name = Sami.getSearchClass(ele.type);
                contents += '<a href=\"' + ele.link + '\">' + ele.name + '</a>';
                contents += '<div class=\"search-type type-' + ele.type + '\"><span class=\"pull-right label ' + class_name + '\">' + ele.type + '</span></div>';
                contents += '</h2>';

                if (ele.fromName && ele.fromLink) {
                    contents += '<div class=\"search-from\">from <a href=\"' + ele.fromLink + '\">' + ele.fromName + '</a></div>';
                }

                contents += '<div class=\"search-description\">';

                // Add description, decode entities, and strip wrapping quotes
                if (ele.doc) {
                    text_content = \$('<p>' + ele.doc + '</p>').text();
                    if (text_content[0] == '\"') {
                        text_content = text_content.substring(1);
                    }
                    if (text_content[text_content.length - 1] == '\"') {
                        text_content = text_content.substring(0, text_content.length - 1);
                    }
                    contents += text_content;
                }

                contents += '</div></li>';
                container.append(\$(contents));
            }
        })();
    </script>
";
    }

    public function getTemplateName()
    {
        return "search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 50,  89 => 36,  86 => 35,  79 => 31,  62 => 17,  50 => 7,  47 => 6,  41 => 4,  34 => 3,  30 => 1,  28 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% from "macros.twig" import class_link, namespace_link, method_link, property_link %}*/
/* {% block title %}Search | {{ parent() }}{% endblock %}*/
/* {% block body_class 'search-page' %}*/
/* */
/* {% block page_content %}*/
/* */
/*     <div class="page-header">*/
/*         <h1>Search</h1>*/
/*     </div>*/
/* */
/*     <p>This page allows you to search through the API documentation for*/
/*     specific terms. Enter your search words into the box below and click*/
/*     "submit". The search will be performed on namespaces, clases, interfaces,*/
/*     traits, functions, and methods.</p>*/
/* */
/*     <form class="form-inline" role="form" action="{{ path('search.html') }}" method="GET">*/
/*         <div class="form-group">*/
/*             <label class="sr-only" for="search">Search</label>*/
/*             <input type="search" class="form-control" name="search" id="search" placeholder="Search">*/
/*         </div>*/
/*         <button type="submit" class="btn btn-default">submit</button>*/
/*     </form>*/
/* */
/*     <h2>Search Results</h2>*/
/* */
/*     <div class="container-fluid">*/
/*         <ul class="search-results"></ul>*/
/*     </div>*/
/* */
/*     {{ block('js_search') }}*/
/* */
/* {% endblock %}*/
/* */
/* {% block js_search %}*/
/*     <script type="text/javascript">*/
/* */
/*         (function() {*/
/*             var term = Sami.cleanSearchTerm();*/
/* */
/*             if (!term) {*/
/*                 $('h2').hide();*/
/*                 return;*/
/*             }*/
/* */
/*             $('#search').val(term);*/
/*             var container = $('.search-results');*/
/* */
/*             // create the search index*/
/*             {{ block('search_index') }}*/
/* */
/*             var results = Sami.search(term);*/
/*             var len = results.length;*/
/* */
/*             if (len == 0) {*/
/*                 container.html('No results were found');*/
/*                 return;*/
/*             }*/
/* */
/*             for (var i = 0, text_content = ''; i < len; i++) {*/
/* */
/*                 var ele = results[i];*/
/*                 var contents = '<li><h2 class="clearfix">';*/
/*                 var class_name = Sami.getSearchClass(ele.type);*/
/*                 contents += '<a href="' + ele.link + '">' + ele.name + '</a>';*/
/*                 contents += '<div class="search-type type-' + ele.type + '"><span class="pull-right label ' + class_name + '">' + ele.type + '</span></div>';*/
/*                 contents += '</h2>';*/
/* */
/*                 if (ele.fromName && ele.fromLink) {*/
/*                     contents += '<div class="search-from">from <a href="' + ele.fromLink + '">' + ele.fromName + '</a></div>';*/
/*                 }*/
/* */
/*                 contents += '<div class="search-description">';*/
/* */
/*                 // Add description, decode entities, and strip wrapping quotes*/
/*                 if (ele.doc) {*/
/*                     text_content = $('<p>' + ele.doc + '</p>').text();*/
/*                     if (text_content[0] == '"') {*/
/*                         text_content = text_content.substring(1);*/
/*                     }*/
/*                     if (text_content[text_content.length - 1] == '"') {*/
/*                         text_content = text_content.substring(0, text_content.length - 1);*/
/*                     }*/
/*                     contents += text_content;*/
/*                 }*/
/* */
/*                 contents += '</div></li>';*/
/*                 container.append($(contents));*/
/*             }*/
/*         })();*/
/*     </script>*/
/* {% endblock %}*/
/* */

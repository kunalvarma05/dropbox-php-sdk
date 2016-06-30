<?php

/* default/layout/base.twig */
class __TwigTemplate_fd725d380f52b6d6c8c4e1f5e9fdd157b2ba0f0b1d3081bf5b96681c452dae33 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'html' => array($this, 'block_html'),
            'body_class' => array($this, 'block_body_class'),
            'page_id' => array($this, 'block_page_id'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"robots\" content=\"index, follow, all\" />
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 8
        $this->displayBlock('head', $context, $blocks);
        // line 20
        echo "
    ";
        // line 21
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "favicon"), "method")) {
            // line 22
            echo "        <link rel=\"shortcut icon\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "favicon"), "method"), "html", null, true);
            echo "\" />
    ";
        }
        // line 24
        echo "
    ";
        // line 25
        if ($this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "base_url"), "method")) {
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "versions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 27
                echo "<link rel=\"search\"
                  type=\"application/opensearchdescription+xml\"
                  href=\"";
                // line 29
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "base_url"), "method"), array("%version%" => $context["version"])), "html", null, true);
                echo "/opensearch.xml\"
                  title=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "title"), "method"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $context["version"], "html", null, true);
                echo ")\" />
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 33
        echo "</head>

";
        // line 35
        $this->displayBlock('html', $context, $blocks);
        // line 40
        echo "
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "title"), "method"), "html", null, true);
    }

    // line 8
    public function block_head($context, array $blocks = array())
    {
        // line 9
        echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/bootstrap.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/bootstrap-theme.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "css/sami.css"), "html", null, true);
        echo "\">
        <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "js/jquery-1.11.1.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "js/typeahead.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('sami')->pathForStaticFile($context, "sami.js"), "html", null, true);
        echo "\"></script>
        <meta name=\"MobileOptimized\" content=\"width\">
        <meta name=\"HandheldFriendly\" content=\"true\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">
    ";
    }

    // line 35
    public function block_html($context, array $blocks = array())
    {
        // line 36
        echo "    <body id=\"";
        $this->displayBlock('body_class', $context, $blocks);
        echo "\" data-name=\"";
        $this->displayBlock('page_id', $context, $blocks);
        echo "\" data-root-path=\"";
        echo twig_escape_filter($this->env, (isset($context["root_path"]) ? $context["root_path"] : $this->getContext($context, "root_path")), "html", null, true);
        echo "\">
        ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "    </body>
";
    }

    // line 36
    public function block_body_class($context, array $blocks = array())
    {
        echo "";
    }

    public function block_page_id($context, array $blocks = array())
    {
        echo "";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "default/layout/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 37,  152 => 36,  147 => 38,  145 => 37,  136 => 36,  133 => 35,  124 => 15,  120 => 14,  116 => 13,  112 => 12,  108 => 11,  104 => 10,  99 => 9,  96 => 8,  90 => 6,  84 => 40,  82 => 35,  78 => 33,  67 => 30,  63 => 29,  59 => 27,  55 => 26,  53 => 25,  50 => 24,  44 => 22,  42 => 21,  39 => 20,  37 => 8,  32 => 6,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8" />*/
/*     <meta name="robots" content="index, follow, all" />*/
/*     <title>{% block title project.config('title') %}</title>*/
/* */
/*     {% block head %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ path('css/bootstrap.min.css') }}">*/
/*         <link rel="stylesheet" type="text/css" href="{{ path('css/bootstrap-theme.min.css') }}">*/
/*         <link rel="stylesheet" type="text/css" href="{{ path('css/sami.css') }}">*/
/*         <script src="{{ path('js/jquery-1.11.1.min.js') }}"></script>*/
/*         <script src="{{ path('js/bootstrap.min.js') }}"></script>*/
/*         <script src="{{ path('js/typeahead.min.js') }}"></script>*/
/*         <script src="{{ path('sami.js') }}"></script>*/
/*         <meta name="MobileOptimized" content="width">*/
/*         <meta name="HandheldFriendly" content="true">*/
/*         <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">*/
/*     {% endblock %}*/
/* */
/*     {% if project.config('favicon') %}*/
/*         <link rel="shortcut icon" href="{{ project.config('favicon') }}" />*/
/*     {% endif %}*/
/* */
/*     {% if project.config('base_url') %}*/
/*         {%- for version in project.versions -%}*/
/*             <link rel="search"*/
/*                   type="application/opensearchdescription+xml"*/
/*                   href="{{ project.config('base_url')|replace({'%version%': version}) }}/opensearch.xml"*/
/*                   title="{{ project.config('title') }} ({{ version }})" />*/
/*         {% endfor -%}*/
/*     {% endif %}*/
/* </head>*/
/* */
/* {% block html %}*/
/*     <body id="{% block body_class '' %}" data-name="{% block page_id '' %}" data-root-path="{{ root_path }}">*/
/*         {% block content '' %}*/
/*     </body>*/
/* {% endblock %}*/
/* */
/* </html>*/
/* */

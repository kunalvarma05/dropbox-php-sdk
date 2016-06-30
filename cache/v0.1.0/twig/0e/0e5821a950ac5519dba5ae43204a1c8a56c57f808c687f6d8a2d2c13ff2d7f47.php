<?php

/* namespaces.twig */
class __TwigTemplate_9685a08a25f14d8dc790fbb6306486c61cd0d92a046bfcfbbc721e4071ea4607 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "namespaces.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Namespaces | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body_class($context, array $blocks = array())
    {
        echo "namespaces";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"page-header\">
        <h1>Namespaces</h1>
    </div>

    ";
        // line 10
        if ((isset($context["namespaces"]) ? $context["namespaces"] : $this->getContext($context, "namespaces"))) {
            // line 11
            echo "        <div class=\"namespaces clearfix\">
            ";
            // line 12
            $context["last_name"] = "";
            // line 13
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["namespaces"]) ? $context["namespaces"] : $this->getContext($context, "namespaces")));
            foreach ($context['_seq'] as $context["_key"] => $context["namespace"]) {
                // line 14
                echo "                ";
                $context["top_level"] = twig_first($this->env, twig_split_filter($this->env, $context["namespace"], "\\"));
                // line 15
                echo "                ";
                if (((isset($context["top_level"]) ? $context["top_level"] : $this->getContext($context, "top_level")) != (isset($context["last_name"]) ? $context["last_name"] : $this->getContext($context, "last_name")))) {
                    // line 16
                    echo "                    ";
                    if ((isset($context["last_name"]) ? $context["last_name"] : $this->getContext($context, "last_name"))) {
                        echo "</ul></div>";
                    }
                    // line 17
                    echo "                    <div class=\"namespace-container\">
                        <h2>";
                    // line 18
                    echo (isset($context["top_level"]) ? $context["top_level"] : $this->getContext($context, "top_level"));
                    echo "</h2>
                        <ul>
                    ";
                    // line 20
                    $context["last_name"] = (isset($context["top_level"]) ? $context["top_level"] : $this->getContext($context, "top_level"));
                    // line 21
                    echo "                ";
                }
                // line 22
                echo "                <li><a href=\"";
                echo $this->env->getExtension('sami')->pathForNamespace($context, $context["namespace"]);
                echo "\">";
                echo $context["namespace"];
                echo "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['namespace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                </ul>
            </div>
        </div>
    ";
        }
        // line 28
        echo "
";
    }

    public function getTemplateName()
    {
        return "namespaces.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 28,  99 => 24,  88 => 22,  85 => 21,  83 => 20,  78 => 18,  75 => 17,  70 => 16,  67 => 15,  64 => 14,  59 => 13,  57 => 12,  54 => 11,  52 => 10,  46 => 6,  43 => 5,  37 => 3,  30 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% block title %}Namespaces | {{ parent() }}{% endblock %}*/
/* {% block body_class 'namespaces' %}*/
/* */
/* {% block page_content %}*/
/*     <div class="page-header">*/
/*         <h1>Namespaces</h1>*/
/*     </div>*/
/* */
/*     {% if namespaces %}*/
/*         <div class="namespaces clearfix">*/
/*             {% set last_name = '' %}*/
/*             {% for namespace in namespaces %}*/
/*                 {% set top_level = namespace|split('\\')|first %}*/
/*                 {% if top_level != last_name %}*/
/*                     {% if last_name %}</ul></div>{% endif %}*/
/*                     <div class="namespace-container">*/
/*                         <h2>{{ top_level|raw }}</h2>*/
/*                         <ul>*/
/*                     {% set last_name = top_level %}*/
/*                 {% endif %}*/
/*                 <li><a href="{{ namespace_path(namespace) }}">{{ namespace|raw }}</a></li>*/
/*             {% endfor %}*/
/*                 </ul>*/
/*             </div>*/
/*         </div>*/
/*     {% endif %}*/
/* */
/* {% endblock %}*/
/* */

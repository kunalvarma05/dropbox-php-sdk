<?php

/* doc-index.twig */
class __TwigTemplate_8a4da749936c9fe3197b59e913ed7f42ef36fe322e6f39af7dc2cea4f9f96a0c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "doc-index.twig", 1);
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
        // line 2
        $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"] = $this->loadTemplate("macros.twig", "doc-index.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Index | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "doc-index";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <div class=\"page-header\">
        <h1>Index</h1>
    </div>

    <ul class=\"pagination\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range("A", "Z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 14
            echo "            ";
            if (($this->getAttribute((isset($context["items"]) ? $context["items"] : null), $context["letter"], array(), "array", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["items"]) ? $context["items"] : $this->getContext($context, "items")), $context["letter"], array(), "array")) > 1))) {
                // line 15
                echo "                <li><a href=\"#letter";
                echo $context["letter"];
                echo "\">";
                echo $context["letter"];
                echo "</a></li>
            ";
            } else {
                // line 17
                echo "                <li class=\"disabled\"><a href=\"#letter";
                echo $context["letter"];
                echo "\">";
                echo $context["letter"];
                echo "</a></li>
            ";
            }
            // line 19
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </ul>

    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : $this->getContext($context, "items")));
        foreach ($context['_seq'] as $context["letter"] => $context["elements"]) {
            // line 23
            echo "<h2 id=\"letter";
            echo $context["letter"];
            echo "\">";
            echo $context["letter"];
            echo "</h2>
        <dl id=\"index\">";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["elements"]);
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 26
                $context["type"] = $this->getAttribute($context["element"], 0, array(), "array");
                // line 27
                $context["value"] = $this->getAttribute($context["element"], 1, array(), "array");
                // line 28
                if (("class" == (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) {
                    // line 29
                    echo "<dt>";
                    echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getclass_link((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
                    if ((isset($context["has_namespaces"]) ? $context["has_namespaces"] : $this->getContext($context, "has_namespaces"))) {
                        echo " &mdash; <em>Class in namespace ";
                        echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getnamespace_link($this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "namespace", array()));
                    }
                    echo "</em></dt>
                    <dd>";
                    // line 30
                    echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "shortdesc", array()), (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
                    echo "</dd>";
                } elseif (("method" ==                 // line 31
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) {
                    // line 32
                    echo "<dt>";
                    echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getmethod_link((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
                    echo "() &mdash; <em>Method in class ";
                    echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getclass_link($this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "class", array()));
                    echo "</em></dt>
                    <dd>";
                    // line 33
                    echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "shortdesc", array()), $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "class", array()));
                    echo "</dd>";
                } elseif (("property" ==                 // line 34
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) {
                    // line 35
                    echo "<dt>\$";
                    echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getproperty_link((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")));
                    echo " &mdash; <em>Property in class ";
                    echo $context["__internal_002a69bfc466378862092239eeea3b1e485dac800c4117e1e0256d1581ff8fde"]->getclass_link($this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "class", array()));
                    echo "</em></dt>
                    <dd>";
                    // line 36
                    echo $this->env->getExtension('sami')->parseDesc($context, $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "shortdesc", array()), $this->getAttribute((isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), "class", array()));
                    echo "</dd>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        </dl>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['letter'], $context['elements'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "doc-index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 39,  144 => 36,  137 => 35,  135 => 34,  132 => 33,  125 => 32,  123 => 31,  120 => 30,  111 => 29,  109 => 28,  107 => 27,  105 => 26,  101 => 25,  94 => 23,  90 => 22,  86 => 20,  80 => 19,  72 => 17,  64 => 15,  61 => 14,  57 => 13,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
    }
}
/* {% extends "layout/layout.twig" %}*/
/* {% from "macros.twig" import class_link, namespace_link, method_link, property_link %}*/
/* {% block title %}Index | {{ parent() }}{% endblock %}*/
/* {% block body_class 'doc-index' %}*/
/* */
/* {% block page_content %}*/
/* */
/*     <div class="page-header">*/
/*         <h1>Index</h1>*/
/*     </div>*/
/* */
/*     <ul class="pagination">*/
/*         {% for letter in 'A'..'Z' %}*/
/*             {% if items[letter] is defined and items[letter]|length > 1 %}*/
/*                 <li><a href="#letter{{ letter|raw }}">{{ letter|raw }}</a></li>*/
/*             {% else %}*/
/*                 <li class="disabled"><a href="#letter{{ letter|raw }}">{{ letter|raw }}</a></li>*/
/*             {% endif %}*/
/*         {% endfor %}*/
/*     </ul>*/
/* */
/*     {% for letter, elements in items -%}*/
/*         <h2 id="letter{{ letter|raw }}">{{ letter|raw }}</h2>*/
/*         <dl id="index">*/
/*             {%- for element in elements %}*/
/*                 {%- set type = element[0] %}*/
/*                 {%- set value = element[1] %}*/
/*                 {%- if 'class' == type -%}*/
/*                     <dt>{{ class_link(value) }}{% if has_namespaces %} &mdash; <em>Class in namespace {{ namespace_link(value.namespace) }}{% endif %}</em></dt>*/
/*                     <dd>{{ value.shortdesc|desc(value) }}</dd>*/
/*                 {%- elseif 'method' == type -%}*/
/*                     <dt>{{ method_link(value) }}() &mdash; <em>Method in class {{ class_link(value.class) }}</em></dt>*/
/*                     <dd>{{ value.shortdesc|desc(value.class) }}</dd>*/
/*                 {%- elseif 'property' == type -%}*/
/*                     <dt>${{ property_link(value) }} &mdash; <em>Property in class {{ class_link(value.class) }}</em></dt>*/
/*                     <dd>{{ value.shortdesc|desc(value.class) }}</dd>*/
/*                 {%- endif %}*/
/*             {%- endfor %}*/
/*         </dl>*/
/*     {%- endfor %}*/
/* {% endblock %}*/
/* */

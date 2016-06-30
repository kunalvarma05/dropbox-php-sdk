<?php

/* sami.js.twig */
class __TwigTemplate_6245b2c3340331a40561d38b7ac5f1949ec73aeaed046d05f5f163f2ea590f97 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'search_index' => array($this, 'block_search_index'),
            'search_index_extra' => array($this, 'block_search_index_extra'),
            'treejs' => array($this, 'block_treejs'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_61a8d1234ef6d79e2056a8dcb1e4d847a2015b6d055305e14c64aeadf7e8804b"] = $this;
        // line 2
        echo "
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '";
        // line 7
        echo twig_replace_filter($context["__internal_61a8d1234ef6d79e2056a8dcb1e4d847a2015b6d055305e14c64aeadf7e8804b"]->getelement((isset($context["tree"]) ? $context["tree"] : $this->getContext($context, "tree")), $this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "default_opened_level"), "method"), 0), array("'" => "\\'", "
" => ""));
        echo "';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
        ";
        // line 19
        $this->displayBlock('search_index', $context, $blocks);
        // line 39
        echo "        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if \"::\" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\\\') > -1) {
            tokens = tokens.concat(term.split('\\\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string \"search\" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp(\"[\\\\?&]\" + name + \"=([^&#]*)\");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\\+/g, \" \"));
            }

            return term.replace(/<(?:.|\\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return \$.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    \$(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = \$('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href=\"/g, 'href=\"' + rootPath);
        Sami.injectApiTree(\$('#api-tree'));
    });

    return root.Sami;
})(window);

\$(function() {

    // Enable the version switcher
    \$('#version-switcher').change(function() {
        window.location = \$(this).val()
    });

    ";
        // line 156
        $this->displayBlock('treejs', $context, $blocks);
        // line 182
        echo "
    ";
        // line 210
        echo "
        var form = \$('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                \$('#search-form').submit();
                return true;
            }
        });

    ";
        echo "
});

";
        // line 222
        echo "
";
    }

    // line 19
    public function block_search_index($context, array $blocks = array())
    {
        // line 20
        echo "            ";
        $context["__internal_b97d2894e6f9e1495b8ab34603ba9443bcd0fcfa54df03b6cffb6eb1974a291c"] = $this;
        // line 21
        echo "
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["namespaces"]) ? $context["namespaces"] : $this->getContext($context, "namespaces")));
        foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
            // line 23
            echo "{\"type\": \"Namespace\", \"link\": \"";
            echo $this->env->getExtension('sami')->pathForNamespace($context, $context["ns"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter($context["ns"], array("\\" => "\\\\"));
            echo "\", \"doc\": \"Namespace ";
            echo twig_replace_filter($context["ns"], array("\\" => "\\\\"));
            echo "\"},";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "
            ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["interfaces"]) ? $context["interfaces"] : $this->getContext($context, "interfaces")));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 27
            echo "{\"type\": \"Interface\", ";
            if ($this->getAttribute($context["class"], "namespace", array())) {
                echo "\"fromName\": \"";
                echo twig_replace_filter($this->getAttribute($context["class"], "namespace", array()), array("\\" => "\\\\"));
                echo "\", \"fromLink\": \"";
                echo $this->env->getExtension('sami')->pathForNamespace($context, $this->getAttribute($context["class"], "namespace", array()));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->env->getExtension('sami')->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter($this->getAttribute($context["class"], "name", array()), array("\\" => "\\\\"));
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 28
            echo $context["__internal_b97d2894e6f9e1495b8ab34603ba9443bcd0fcfa54df03b6cffb6eb1974a291c"]->getadd_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "
            ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 32
            echo "{\"type\": ";
            if ($this->getAttribute($context["class"], "isTrait", array())) {
                echo "\"Trait\"";
            } else {
                echo "\"Class\"";
            }
            echo ", ";
            if ($this->getAttribute($context["class"], "namespace", array())) {
                echo "\"fromName\": \"";
                echo twig_replace_filter($this->getAttribute($context["class"], "namespace", array()), array("\\" => "\\\\"));
                echo "\", \"fromLink\": \"";
                echo $this->env->getExtension('sami')->pathForNamespace($context, $this->getAttribute($context["class"], "namespace", array()));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->env->getExtension('sami')->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter($this->getAttribute($context["class"], "name", array()), array("\\" => "\\\\"));
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 33
            echo $context["__internal_b97d2894e6f9e1495b8ab34603ba9443bcd0fcfa54df03b6cffb6eb1974a291c"]->getadd_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "
            ";
        // line 37
        echo "            ";
        $this->displayBlock('search_index_extra', $context, $blocks);
        // line 38
        echo "        ";
    }

    // line 37
    public function block_search_index_extra($context, array $blocks = array())
    {
        echo "";
    }

    // line 156
    public function block_treejs($context, array $blocks = array())
    {
        // line 157
        echo "
        // Toggle left-nav divs on click
        \$('#api-tree .hd span').click(function() {
            \$(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = \$('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = \$('#api-tree');
            var node = \$('#api-tree li[data-name=\"' + expected + '\"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    ";
    }

    // line 213
    public function getadd_class_methods_index($__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 214
            echo "    ";
            if ($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "methods", array())) {
                // line 215
                echo "        ";
                $context["from_name"] = twig_replace_filter($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "name", array()), array("\\" => "\\\\"));
                // line 216
                echo "        ";
                $context["from_link"] = $this->env->getExtension('sami')->pathForClass($context, (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")));
                // line 217
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")), "methods", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["meth"]) {
                    // line 218
                    echo "            {\"type\": \"Method\", \"fromName\": \"";
                    echo (isset($context["from_name"]) ? $context["from_name"] : $this->getContext($context, "from_name"));
                    echo "\", \"fromLink\": \"";
                    echo (isset($context["from_link"]) ? $context["from_link"] : $this->getContext($context, "from_link"));
                    echo "\", \"link\": \"";
                    echo $this->env->getExtension('sami')->pathForMethod($context, $context["meth"]);
                    echo "\", \"name\": \"";
                    echo twig_replace_filter($context["meth"], array("\\" => "\\\\"));
                    echo "\", \"doc\": \"";
                    echo twig_escape_filter($this->env, twig_jsonencode_filter($this->env->getExtension('sami')->parseDesc($context, $this->getAttribute($context["meth"], "shortdesc", array()), (isset($context["class"]) ? $context["class"] : $this->getContext($context, "class")))), "html", null, true);
                    echo "\"},
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meth'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 220
                echo "    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 223
    public function getelement($__tree__ = null, $__opened__ = null, $__depth__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "tree" => $__tree__,
            "opened" => $__opened__,
            "depth" => $__depth__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 224
            echo "    ";
            $context["__internal_3d3c0d85bfc036c58f081e110717206336e9240242a24ce55773e4f8c77f0393"] = $this;
            // line 225
            echo "
    <ul>";
            // line 227
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tree"]) ? $context["tree"] : $this->getContext($context, "tree")));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 228
                if ($this->getAttribute($context["element"], 2, array(), "array")) {
                    // line 229
                    echo "                <li data-name=\"namespace:";
                    echo twig_replace_filter($this->getAttribute($context["element"], 1, array(), "array"), array("\\" => "_"));
                    echo "\" ";
                    if (((isset($context["depth"]) ? $context["depth"] : $this->getContext($context, "depth")) < (isset($context["opened"]) ? $context["opened"] : $this->getContext($context, "opened")))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 230
                    echo ((isset($context["depth"]) ? $context["depth"] : $this->getContext($context, "depth")) * 18);
                    echo "px\" class=\"hd\">
                        <span class=\"glyphicon glyphicon-play\"></span>";
                    // line 231
                    if ( !$this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "simulate_namespaces"), "method")) {
                        echo "<a href=\"";
                        echo $this->env->getExtension('sami')->pathForNamespace($context, $this->getAttribute($context["element"], 1, array(), "array"));
                        echo "\">";
                    }
                    echo $this->getAttribute($context["element"], 0, array(), "array");
                    if ( !$this->getAttribute((isset($context["project"]) ? $context["project"] : $this->getContext($context, "project")), "config", array(0 => "simulate_namespaces"), "method")) {
                        echo "</a>";
                    }
                    // line 232
                    echo "                    </div>
                    <div class=\"bd\">
                        ";
                    // line 234
                    echo $context["__internal_3d3c0d85bfc036c58f081e110717206336e9240242a24ce55773e4f8c77f0393"]->getelement($this->getAttribute($context["element"], 2, array(), "array"), (isset($context["opened"]) ? $context["opened"] : $this->getContext($context, "opened")), ((isset($context["depth"]) ? $context["depth"] : $this->getContext($context, "depth")) + 1));
                    // line 235
                    echo "</div>
                </li>
            ";
                } else {
                    // line 238
                    echo "                <li data-name=\"class:";
                    echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute($this->getAttribute($context["element"], 1, array(), "array"), "name", array()), array("\\" => "_")), "html", null, true);
                    echo "\" ";
                    if (((isset($context["depth"]) ? $context["depth"] : $this->getContext($context, "depth")) < (isset($context["opened"]) ? $context["opened"] : $this->getContext($context, "opened")))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 239
                    echo twig_escape_filter($this->env, (8 + ((isset($context["depth"]) ? $context["depth"] : $this->getContext($context, "depth")) * 18)), "html", null, true);
                    echo "px\" class=\"hd leaf\">
                        <a href=\"";
                    // line 240
                    echo $this->env->getExtension('sami')->pathForClass($context, $this->getAttribute($context["element"], 1, array(), "array"));
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["element"], 0, array(), "array"), "html", null, true);
                    echo "</a>
                    </div>
                </li>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 245
            echo "    </ul>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "sami.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  498 => 245,  485 => 240,  481 => 239,  472 => 238,  467 => 235,  465 => 234,  461 => 232,  451 => 231,  447 => 230,  438 => 229,  436 => 228,  432 => 227,  429 => 225,  426 => 224,  412 => 223,  396 => 220,  379 => 218,  374 => 217,  371 => 216,  368 => 215,  365 => 214,  353 => 213,  325 => 157,  322 => 156,  316 => 37,  312 => 38,  309 => 37,  306 => 35,  298 => 33,  275 => 32,  271 => 31,  268 => 30,  260 => 28,  243 => 27,  239 => 26,  236 => 25,  224 => 23,  220 => 22,  217 => 21,  214 => 20,  211 => 19,  206 => 222,  173 => 210,  170 => 182,  168 => 156,  49 => 39,  47 => 19,  31 => 7,  24 => 2,  22 => 1,);
    }
}
/* {% from _self import element %}*/
/* */
/* (function(root) {*/
/* */
/*     var bhIndex = null;*/
/*     var rootPath = '';*/
/*     var treeHtml = '{{ element(tree, project.config('default_opened_level'), 0)|replace({"'": "\\'", "\n": ''})|raw }}';*/
/* */
/*     var searchTypeClasses = {*/
/*         'Namespace': 'label-default',*/
/*         'Class': 'label-info',*/
/*         'Interface': 'label-primary',*/
/*         'Trait': 'label-success',*/
/*         'Method': 'label-danger',*/
/*         '_': 'label-warning'*/
/*     };*/
/* */
/*     var searchIndex = [*/
/*         {% block search_index %}*/
/*             {% from _self import add_class_methods_index %}*/
/* */
/*             {% for ns in namespaces -%}*/
/*                 {"type": "Namespace", "link": "{{ namespace_path(ns) }}", "name": "{{ ns|replace({'\\': '\\\\'})|raw }}", "doc": "Namespace {{ ns|replace({'\\': '\\\\'})|raw }}"},*/
/*             {%- endfor %}*/
/* */
/*             {% for class in interfaces -%}*/
/*                 {"type": "Interface", {% if class.namespace %}"fromName": "{{ class.namespace|replace({'\\': '\\\\'})|raw }}", "fromLink": "{{ namespace_path(class.namespace)|raw }}",{% endif %} "link": "{{ class_path(class) }}", "name": "{{ class.name|replace({'\\': '\\\\'})|raw }}", "doc": "{{ class.shortdesc|desc(class)|json_encode }}"},*/
/*                 {{ add_class_methods_index(class) }}*/
/*             {% endfor %}*/
/* */
/*             {% for class in classes -%}*/
/*                 {"type": {% if class.isTrait %}"Trait"{% else %}"Class"{% endif %}, {% if class.namespace %}"fromName": "{{ class.namespace|replace({'\\': '\\\\'})|raw }}", "fromLink": "{{ namespace_path(class.namespace) }}",{% endif %} "link": "{{ class_path(class) }}", "name": "{{ class.name|replace({'\\': '\\\\'})|raw }}", "doc": "{{ class.shortdesc|desc(class)|json_encode }}"},*/
/*                 {{ add_class_methods_index(class) }}*/
/*             {% endfor %}*/
/* */
/*             {# Override this block, search_index_extra, to add custom search entries! #}*/
/*             {% block search_index_extra '' %}*/
/*         {% endblock %}*/
/*         // Fix trailing commas in the index*/
/*         {}*/
/*     ];*/
/* */
/*     /** Tokenizes strings by namespaces and functions *//* */
/*     function tokenizer(term) {*/
/*         if (!term) {*/
/*             return [];*/
/*         }*/
/* */
/*         var tokens = [term];*/
/*         var meth = term.indexOf('::');*/
/* */
/*         // Split tokens into methods if "::" is found.*/
/*         if (meth > -1) {*/
/*             tokens.push(term.substr(meth + 2));*/
/*             term = term.substr(0, meth - 2);*/
/*         }*/
/* */
/*         // Split by namespace or fake namespace.*/
/*         if (term.indexOf('\\') > -1) {*/
/*             tokens = tokens.concat(term.split('\\'));*/
/*         } else if (term.indexOf('_') > 0) {*/
/*             tokens = tokens.concat(term.split('_'));*/
/*         }*/
/* */
/*         // Merge in splitting the string by case and return*/
/*         tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));*/
/* */
/*         return tokens;*/
/*     };*/
/* */
/*     root.Sami = {*/
/*         /***/
/*          * Cleans the provided term. If no term is provided, then one is*/
/*          * grabbed from the query string "search" parameter.*/
/*          *//* */
/*         cleanSearchTerm: function(term) {*/
/*             // Grab from the query string*/
/*             if (typeof term === 'undefined') {*/
/*                 var name = 'search';*/
/*                 var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");*/
/*                 var results = regex.exec(location.search);*/
/*                 if (results === null) {*/
/*                     return null;*/
/*                 }*/
/*                 term = decodeURIComponent(results[1].replace(/\+/g, " "));*/
/*             }*/
/* */
/*             return term.replace(/<(?:.|\n)*?>/gm, '');*/
/*         },*/
/* */
/*         /** Searches through the index for a given term *//* */
/*         search: function(term) {*/
/*             // Create a new search index if needed*/
/*             if (!bhIndex) {*/
/*                 bhIndex = new Bloodhound({*/
/*                     limit: 500,*/
/*                     local: searchIndex,*/
/*                     datumTokenizer: function (d) {*/
/*                         return tokenizer(d.name);*/
/*                     },*/
/*                     queryTokenizer: Bloodhound.tokenizers.whitespace*/
/*                 });*/
/*                 bhIndex.initialize();*/
/*             }*/
/* */
/*             results = [];*/
/*             bhIndex.get(term, function(matches) {*/
/*                 results = matches;*/
/*             });*/
/* */
/*             if (!rootPath) {*/
/*                 return results;*/
/*             }*/
/* */
/*             // Fix the element links based on the current page depth.*/
/*             return $.map(results, function(ele) {*/
/*                 if (ele.link.indexOf('..') > -1) {*/
/*                     return ele;*/
/*                 }*/
/*                 ele.link = rootPath + ele.link;*/
/*                 if (ele.fromLink) {*/
/*                     ele.fromLink = rootPath + ele.fromLink;*/
/*                 }*/
/*                 return ele;*/
/*             });*/
/*         },*/
/* */
/*         /** Get a search class for a specific type *//* */
/*         getSearchClass: function(type) {*/
/*             return searchTypeClasses[type] || searchTypeClasses['_'];*/
/*         },*/
/* */
/*         /** Add the left-nav tree to the site *//* */
/*         injectApiTree: function(ele) {*/
/*             ele.html(treeHtml);*/
/*         }*/
/*     };*/
/* */
/*     $(function() {*/
/*         // Modify the HTML to work correctly based on the current depth*/
/*         rootPath = $('body').attr('data-root-path');*/
/*         treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);*/
/*         Sami.injectApiTree($('#api-tree'));*/
/*     });*/
/* */
/*     return root.Sami;*/
/* })(window);*/
/* */
/* $(function() {*/
/* */
/*     // Enable the version switcher*/
/*     $('#version-switcher').change(function() {*/
/*         window.location = $(this).val()*/
/*     });*/
/* */
/*     {% block treejs %}*/
/* */
/*         // Toggle left-nav divs on click*/
/*         $('#api-tree .hd span').click(function() {*/
/*             $(this).parent().parent().toggleClass('opened');*/
/*         });*/
/* */
/*         // Expand the parent namespaces of the current page.*/
/*         var expected = $('body').attr('data-name');*/
/* */
/*         if (expected) {*/
/*             // Open the currently selected node and its parents.*/
/*             var container = $('#api-tree');*/
/*             var node = $('#api-tree li[data-name="' + expected + '"]');*/
/*             // Node might not be found when simulating namespaces*/
/*             if (node.length > 0) {*/
/*                 node.addClass('active').addClass('opened');*/
/*                 node.parents('li').addClass('opened');*/
/*                 var scrollPos = node.offset().top - container.offset().top + container.scrollTop();*/
/*                 // Position the item nearer to the top of the screen.*/
/*                 scrollPos -= 200;*/
/*                 container.scrollTop(scrollPos);*/
/*             }*/
/*         }*/
/* */
/*     {% endblock %}*/
/* */
/*     {% verbatim %}*/
/*         var form = $('#search-form .typeahead');*/
/*         form.typeahead({*/
/*             hint: true,*/
/*             highlight: true,*/
/*             minLength: 1*/
/*         }, {*/
/*             name: 'search',*/
/*             displayKey: 'name',*/
/*             source: function (q, cb) {*/
/*                 cb(Sami.search(q));*/
/*             }*/
/*         });*/
/* */
/*         // The selection is direct-linked when the user selects a suggestion.*/
/*         form.on('typeahead:selected', function(e, suggestion) {*/
/*             window.location = suggestion.link;*/
/*         });*/
/* */
/*         // The form is submitted when the user hits enter.*/
/*         form.keypress(function (e) {*/
/*             if (e.which == 13) {*/
/*                 $('#search-form').submit();*/
/*                 return true;*/
/*             }*/
/*         });*/
/* */
/*     {% endverbatim %}*/
/* });*/
/* */
/* {% macro add_class_methods_index(class) %}*/
/*     {% if class.methods %}*/
/*         {% set from_name = class.name|replace({'\\': '\\\\'}) %}*/
/*         {% set from_link = class_path(class) %}*/
/*         {% for meth in class.methods %}*/
/*             {"type": "Method", "fromName": "{{ from_name|raw }}", "fromLink": "{{ from_link|raw }}", "link": "{{ method_path(meth) }}", "name": "{{ meth|replace({'\\': '\\\\'})|raw }}", "doc": "{{ meth.shortdesc|desc(class)|json_encode }}"},*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* {% endmacro %}*/
/* */
/* {% macro element(tree, opened, depth) %}*/
/*     {% from _self import element %}*/
/* */
/*     <ul>*/
/*         {%- for element in tree -%}*/
/*             {% if element[2] %}*/
/*                 <li data-name="namespace:{{ element[1]|replace({'\\': '_'})|raw }}" {% if depth < opened %}class="opened"{% endif %}>*/
/*                     <div style="padding-left:{{ (depth * 18)|raw }}px" class="hd">*/
/*                         <span class="glyphicon glyphicon-play"></span>{% if not project.config('simulate_namespaces') %}<a href="{{ namespace_path(element[1]) }}">{% endif %}{{ element[0]|raw }}{% if not project.config('simulate_namespaces') %}</a>{% endif %}*/
/*                     </div>*/
/*                     <div class="bd">*/
/*                         {{ element(element[2], opened, depth + 1) -}}*/
/*                     </div>*/
/*                 </li>*/
/*             {% else %}*/
/*                 <li data-name="class:{{ (element[1].name)|replace({'\\': '_'}) }}" {% if depth < opened %}class="opened"{% endif %}>*/
/*                     <div style="padding-left:{{ 8 + (depth * 18) }}px" class="hd leaf">*/
/*                         <a href="{{ class_path(element[1]) }}">{{ element[0] }}</a>*/
/*                     </div>*/
/*                 </li>*/
/*             {% endif %}*/
/*         {%- endfor %}*/
/*     </ul>*/
/* {% endmacro %}*/
/* */

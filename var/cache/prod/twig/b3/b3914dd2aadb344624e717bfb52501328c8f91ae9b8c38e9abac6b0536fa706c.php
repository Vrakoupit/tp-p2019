<?php

/* AppBundle:Subject:show.html.twig */
class __TwigTemplate_bb85205b2003ab2c32662f46fbf0a566b3299b3283f9138c622c0477c5dacb88 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "AppBundle:Subject:show.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Sujets";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
    <article class=\"card card-block\">
        <h3 class=\"card-title\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subject"]) ? $context["subject"] : null), "title", array()), "html", null, true);
        echo "</h3>
        <section class=\"card-text\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["subject"]) ? $context["subject"] : null), "description", array()), "html", null, true);
        echo "</section>
        <span class=\"card-text\">
                <small class=\"text-muted\">
                    ";
        // line 12
        echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute((isset($context["subject"]) ? $context["subject"] : null), "updatedAt", array())), "html", null, true);
        echo "
                </small>
            </span>
    </article>

";
    }

    public function getTemplateName()
    {
        return "AppBundle:Subject:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  46 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title 'Sujets' %}*/
/* */
/* {% block body %}*/
/* */
/*     <article class="card card-block">*/
/*         <h3 class="card-title">{{ subject.title }}</h3>*/
/*         <section class="card-text">{{ subject.description }}</section>*/
/*         <span class="card-text">*/
/*                 <small class="text-muted">*/
/*                     {{ subject.updatedAt|localizeddate }}*/
/*                 </small>*/
/*             </span>*/
/*     </article>*/
/* */
/* {% endblock %}*/

# Genesis
Operation genesis




==================== Interpreting CSS ID's ====================
To visualize the structure of this layout, follow the
interpretation guidelines below.

For each line skipped in the documentation, there is
one div being closed in the HTML-code.
E.g. the following scope:

#id_A{

}
#id_A1{

}

#id_A2{

}
#id_A2-sub{

}


#id_B{

}

 ...means that
      id_A and id_B are divs that are separate.
      id_A1 and id_A2 are divs inside id_A.
      id_A2-sub is a div inside A2.

Simplified example:
    w
    x

    y


    z
      One line break means x is inside w
      Two line breaks means that y is inside the same div as x (= w)
      Three line breaks means that z it outside the div that y is in,
      outside w, which means it's separate from w.

===============================================================

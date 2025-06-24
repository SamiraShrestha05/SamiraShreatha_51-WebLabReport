<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" indent="yes"/>

  <xsl:key name="category" match="product[quantity &gt;= 10]" use="category"/>

  <xsl:template match="/">
    <products>
      <xsl:for-each select="products/product[generate-id() = generate-id(key('category', category)[1])]">
        <category name="{category}">
          <xsl:for-each select="key('category', category)">
            <xsl:sort select="price" data-type="number" order="descending"/>
            <product>
              <xsl:attribute name="productname">
                <xsl:value-of select="productname"/>
              </xsl:attribute>
              <price><xsl:value-of select="price"/></price>
              <quantity><xsl:value-of select="quantity"/></quantity>
              <total-price>
                <xsl:value-of select="format-number(price * quantity, '0.00')"/>
              </total-price>
            </product>
          </xsl:for-each>
        </category>
      </xsl:for-each>
    </products>
  </xsl:template>

</xsl:stylesheet>

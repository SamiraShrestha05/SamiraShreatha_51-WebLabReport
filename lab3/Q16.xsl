<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="xml" indent="yes"/>

    <xsl:key name="products-by-category" match="product[quantity >= 10]" use="category"/>

    <xsl:template match="/products">
        <categorized_products>
            <xsl:for-each select="product[generate-id() = generate-id(key('products-by-category', category)[1]) and quantity >= 10]">
                <xsl:sort select="category"/> <category name="{category}">
                    <xsl:for-each select="key('products-by-category', category)">
                        <xsl:sort select="price" data-type="number" order="descending"/> <product productname="{productname}"> <xsl:copy-of select="category"/>
                            <xsl:copy-of select="price"/>
                            <xsl:copy-of select="quantity"/>
                            <total-price>
                                <xsl:value-of select="price * quantity"/>
                            </total-price>
                        </product>
                    </xsl:for-each>
                </category>
            </xsl:for-each>
        </categorized_products>
    </xsl:template>

</xsl:stylesheet>

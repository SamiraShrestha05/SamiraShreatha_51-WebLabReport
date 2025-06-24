<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" indent="yes"/>

  <xsl:template match="/students">
    <students>
      <xsl:for-each select="student">
        <student reg_no="{reg_no}">
          <name><xsl:value-of select="name"/></name>
          <symbol_number><xsl:value-of select="symbol_number"/></symbol_number>

          <marks>
            
            <subject name="web"><xsl:value-of select="marks/web"/></subject>
            <subject name="dsa"><xsl:value-of select="marks/dsa"/></subject>
            <subject name="java"><xsl:value-of select="marks/java"/></subject>
            <subject name="sad"><xsl:value-of select="marks/sad"/></subject>
            <subject name="stat"><xsl:value-of select="marks/stat"/></subject>
          </marks>

          
          <xsl:variable name="total" select="marks/web + marks/dsa + marks/java + marks/sad + marks/stat"/>
          <total_marks><xsl:value-of select="$total"/></total_marks>

          
          <percentage><xsl:value-of select="format-number(($total div 5), '0.00')"/></percentage>
        </student>
      </xsl:for-each>
    </students>
  </xsl:template>

</xsl:stylesheet>

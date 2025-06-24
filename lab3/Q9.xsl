<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <html>
      <head>
        <title>XML to CSS</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
          }
          .header {
            background-color: green;
            color: white;
            font-size: 24px;
            font-weight: bold;
            padding: 10px;
          }
          .category {
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            width: 100%;
            border: 1px solid #ccc;
          }
          .category-title {
            font-size: 18px;
            font-weight: bold;
            color: green;
            text-decoration: underline;
            margin-bottom: 5px;
          }
          .item {
            font-size: 14px;
            margin: 2px;
            
          }
          
        </style>
      </head>
      <body>
        <div class="header">Hello Everyone! Welcome to XML to CSS</div>
        <xsl:for-each select="content/category">
          <div class="category">
            <div class="category-title">
              <xsl:value-of select="@name"/>
            </div>
            <xsl:for-each select="item">
              <div class="item">
                <span style="color:{@color}">
                <xsl:value-of select="."/>
                </span>
              </div>
            </xsl:for-each>
          </div>
        </xsl:for-each>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>

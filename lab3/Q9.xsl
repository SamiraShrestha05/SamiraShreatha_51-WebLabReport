<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/content">
        <html>
            <head>
                <title>XML to XSLT Output</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f0f0f0; /* Light grey background */
                    }
                    .container {
                        width: 700px; /* Adjust width as needed to match output */
                        margin: 20px auto; /* Center the container */
                        border: 1px solid #ddd;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                        background-color: #fff;
                    }
                    .main-header {
                        background-color: #008000; /* Green */
                        color: white;
                        font-size: 1.5em;
                        font-weight: bold;
                        padding: 15px 20px;
                        text-align: center;
                        margin-bottom: 5px; /* Space below header */
                    }
                    .section-block {
                        border-top: 1px solid #ccc; /* Separator lines between sections */
                        padding: 15px 20px;
                    }
                    .section-heading {
                        color: #008000; /* Green */
                        font-size: 1.2em;
                        font-weight: bold;
                        margin-bottom: 8px;
                        text-align: center; /* Center section headings */
                    }
                    .item-list {
                        list-style: none; /* Remove bullet points */
                        padding: 0;
                        margin: 0;
                        text-align: center; /* Center list items */
                    }
                    .item-list li {
                        margin-bottom: 3px;
                    }
                    .item-list a {
                        color: #800080; /* Purple */
                        text-decoration: none;
                        font-size: 0.9em;
                    }
                    .item-list a:hover {
                        text-decoration: underline;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="main-header">
                        <xsl:value-of select="main_title"/>
                    </div>
                    <xsl:apply-templates select="sections/section"/>
                </div>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="section">
        <div class="section-block">
            <div class="section-heading">
                <xsl:value-of select="heading"/>
            </div>
            <ul class="item-list">
                <xsl:for-each select="items/item">
                    <li><a><xsl:value-of select="."/></a></li>
                </xsl:for-each>
            </ul>
        </div>
    </xsl:template>

</xsl:stylesheet>
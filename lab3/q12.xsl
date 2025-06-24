<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/book_list">
        <html>
            <head>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #2c7cbc;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Year</th>
                        <th>Author</th>
                        <th>Editor</th>
                        <th>Publisher</th>
                        <th>Price</th>
                    </tr>
                    <xsl:for-each select="book">
                        <tr>
                            <td><xsl:value-of select="title"/></td>
                            <td><xsl:value-of select="year"/></td>
                            <td><xsl:value-of select="author"/></td>
                            <td><xsl:value-of select="editor"/></td>
                            <td><xsl:value-of select="publisher"/></td>
                            <td><xsl:value-of select="price"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

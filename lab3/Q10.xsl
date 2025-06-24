<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/book_list">
        <html>
            <head>
                <title>Book List</title>
                <style>
                    body {
                        font-family: Times New Roman;
                        margin: 20px;
                    }
                    h1 {
                        font-weight: bold;
                    }
                    table {
                        width: auto; 
                    }
                    th, td {
                        padding: 8px 15px;
                        text-align: left;
                    }
                    th {
                        font-weight: bold;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <h1>Book List</h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Edition</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="book">
                            <tr>
                                <td><xsl:value-of select="title"/></td>
                                <td><xsl:value-of select="author"/></td>
                                <td><xsl:value-of select="publisher"/></td>
                                <td><xsl:value-of select="edition"/></td>
                                <td><xsl:value-of select="price"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
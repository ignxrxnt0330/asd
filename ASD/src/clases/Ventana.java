package clases;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.event.ActionListener;

import javax.swing.ImageIcon;
import javax.swing.JFrame;

public class Ventana extends JFrame{

	public Ventana() {
    	//Declarar ventana y establecer tamaño y color
        JFrame ventana = new JFrame("asd");
        ventana.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        ventana.setLayout(new BorderLayout());
        ventana.setSize(new Dimension(600,400));
        ImageIcon favicon = new ImageIcon("favicon.png");
        ventana.setIconImage(favicon.getImage());
        ventana.pack();
        
	}

}
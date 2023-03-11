package pruebas;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BorderFactory;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.SwingUtilities;

import clases.Boton;
import clases.Ventana;

public class Pruebas implements ActionListener {
	static Ventana home = new Ventana();
	static Ventana mrds_clase = new Ventana();
	static Boton home_btn = new Boton("Home");
	static Boton mrds_clase_btn = new Boton("mrds_clase");
	
	public static void main(String[] args) {
		// Declarar panel
 
		JPanel panel = new JPanel();
		panel.setPreferredSize(new Dimension(200, 200));
		panel.setBackground(Color.blue);

		JPanel panel2 = new JPanel();
		panel2.setLayout(new FlowLayout());
		panel.setPreferredSize(new Dimension(200, 200));
		panel2.setBackground(Color.green);

		JPanel panel3 = new JPanel();
		panel.setPreferredSize(new Dimension(200, 200));
		panel3.setBackground(Color.red);

		panel2.add(home_btn);
		panel2.add(mrds_clase_btn);

		home.add(panel, BorderLayout.NORTH);
		home.add(panel2, BorderLayout.WEST);
		home.add(panel3, BorderLayout.CENTER);
		home.pack();
		home.setVisible(true);

		JPanel mc1 = new JPanel();
		mc1.setPreferredSize(new Dimension(200, 200));
		mc1.setBackground(Color.blue);

		JPanel mc2 = new JPanel();
		mc2.setLayout(new FlowLayout());
		mc2.setPreferredSize(new Dimension(200, 200));
		mc2.setBackground(Color.green);

		JPanel mc3 = new JPanel();
		mc3.setPreferredSize(new Dimension(200, 200));
		mc3.setBackground(Color.red);

		mc2.add(home_btn);
		mc2.add(mrds_clase_btn);

		mrds_clase.add(mc1, BorderLayout.NORTH);
		mrds_clase.add(mc2, BorderLayout.WEST);
		mrds_clase.add(mc3, BorderLayout.CENTER);
		mrds_clase.pack();
		mrds_clase.setVisible(false);

	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource() == mrds_clase_btn) {
			mrds_clase.setVisible(true);
			mrds_clase_btn.setEnabled(false);
			home.setVisible(false);
			home.setEnabled(true);

		} else if (e.getSource() == home_btn) {
			home.setVisible(true);
			home.setEnabled(false);
			mrds_clase.setVisible(false);
			mrds_clase_btn.setEnabled(true);

		}
	}

}